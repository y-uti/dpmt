<?php
namespace YUti\Dpmt\Chapter06;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_06_05_ReadWriteLock extends \Threaded
{
    private $readingReaders;
    private $waitingWriters;
    private $writingWriters;
    private $preferWriter;

    public function __construct()
    {
        $this->readingReaders = 0;
        $this->waitingWriters = 0;
        $this->writingWriters = 0;
        $this->preferWriter = true;
    }

    public function readLock()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'readLockImpl']));
    }

    private function readLockImpl()
    {
        while ($this->writingWriters > 0 || ($this->preferWriter && $this->waitingWriters > 0)) {
            $this->wait();
        }
        $this->readingReaders++;
    }

    public function readUnlock()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'readUnlockImpl']));
    }

    private function readUnlockImpl()
    {
        $this->readingReaders--;
        $this->preferWriter = true;
        $this->notify();
    }

    public function writeLock()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'WriteLockImpl']));
    }

    private function writeLockImpl()
    {
        $this->waitingWriters++;
        try {
            while ($this->readingReaders > 0 || $this->writingWriters > 0) {
                $this->wait();
            }
        } finally {
            $this->waitingWriters--;
        }
        $this->writingWriters++;
    }

    public function writeUnlock()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'WriteUnlockImpl']));
    }

    private function writeUnlockImpl()
    {
        $this->writingWriters--;
        $this->preferWriter = false;
        $this->notify();
    }
}

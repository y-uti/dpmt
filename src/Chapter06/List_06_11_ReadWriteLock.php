<?php
namespace YUti\Dpmt\Chapter06;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_06_11_ReadWriteLock extends \Threaded
{
    private $readingReaders;
    private $waitingWriters;
    private $writingWriters;

    public function __construct()
    {
        $this->readingReaders = 0;
        $this->writingWriters = 0;
    }

    public function readLock()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'readLockImpl']));
    }

    private function readLockImpl()
    {
        while ($this->writingWriters > 0) {
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
        $this->notify();
    }

    public function writeLock()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'WriteLockImpl']));
    }

    private function writeLockImpl()
    {
        while ($this->readingReaders > 0 || $this->writingWriters > 0) {
            $this->wait();
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
        $this->notify();
    }
}

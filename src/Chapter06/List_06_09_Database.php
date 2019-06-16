<?php
namespace YUti\Dpmt\Chapter06;

use YUti\Dpmt\Common\Mutex;

class List_06_09_Database extends \Threaded
{
    private $storage;
    private $connected;
    private $lock;

    public function __construct()
    {
        $this->storage = [];
        $this->connected = true;
        $this->lock = new List_06_05_ReadWriteLock();
    }

    public function close()
    {
        $this->lock->writeLock();
        try {
            $this->connected = false;
        } finally {
            $this->lock->writeUnlock();
        }
    }

    public function isConnected()
    {
        $this->lock->readLock();
        try {
            return $this->connected;
        } finally {
            $this->lock->readUnlock();
        }
    }

    public function clear()
    {
        $this->lock->writeLock();
        try {
            $this->verySlowly();
            $this->storage = [];
        } finally {
            $this->lock->writeUnlock();
        }
    }

    public function assign($key, $value)
    {
        $this->lock->writeLock();
        try {
            $this->verySlowly();
            $this->storage[$key] = $value;
        } finally {
            $this->lock->writeUnlock();
        }
    }

    public function retrieve($key)
    {
        $this->lock->readLock();
        try {
            $this->slowly();
            return $this->storage[$key];
        } finally {
            $this->lock->readUnlock();
        }
    }

    private function verySlowly()
    {
        usleep(500000);
    }

    private function slowly()
    {
        usleep(50000);
    }
}

<?php
namespace YUti\Dpmt\Chapter06;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Mutex;

class List_06_11_Data extends \Threaded
{
    private $buffer;
    private $lock;

    public function __construct($size)
    {
        $this->buffer = array_fill(0, $size, '*');
        $this->lock = new List_06_11_ReadWriteLock();
    }

    public function read()
    {
        $this->lock->readLock();
        try {
            return $this->doRead();
        } finally {
            $this->lock->readUnlock();
        }
    }

    public function write($c)
    {
        $this->lock->writeLock();
        try {
            $this->doWrite($c);
        } finally {
            $this->lock->writeUnlock();
        }
    }

    private function doRead()
    {
        $newbuf = array_fill(0, count($this->buffer), '');
        for ($i = 0; $i < count($this->buffer); $i++) {
            $newbuf[$i] = $this->buffer[$i];
        }
        $this->slowly();

        return $newbuf;
    }

    private function doWrite($c)
    {
        for ($i = 0; $i < count($this->buffer); $i++) {
            $this->buffer[$i] = $c;
            $this->slowly();
        }
    }

    private function slowly()
    {
        usleep(1000 * 50);
    }
}

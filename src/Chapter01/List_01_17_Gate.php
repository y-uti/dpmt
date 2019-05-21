<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Mutex;

class List_01_17_Gate extends \Threaded
{
    private $counter;
    private $name;
    private $address;

    private $mutex;

    public function __construct()
    {
        $this->counter = 0;
        $this->name = 'Nobody';
        $this->address = 'Nowhere';
        $this->mutex = new Mutex();
    }

    public function pass($name, $address)
    {
        $this->mutex->lock();
        try {
            $this->counter++;
            $this->name = $name;
            $this->address = $address;
            $this->check();
        } finally {
            $this->mutex->unlock();
        }
    }

    public function __toString()
    {
        $this->mutex->lock();
        try {
            return "No.{$this->counter}: {$this->name}, {$this->address}";
        } finally {
            $this->mutex->unlock();
        }
    }

    private function check()
    {
        if ($this->name[0] !== $this->address[0]) {
            echo "***** BROKEN ***** $this\n";
        }
    }
}

<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Mutex;

class List_01_07_Gate extends \Threaded
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
        $this->passImpl($name, $address);
        $this->mutex->unlock();
    }

    private function passImpl($name, $address)
    {
        $this->counter++;
        $this->name = $name;
        $this->address = $address;
        $this->check();
    }

    public function __toString()
    {
        $this->mutex->lock();
        $this->__toStringImpl();
        $this->mutex->unlock();
    }

    private function __toStringImpl()
    {
        return "No.{$this->counter}: {$this->name}, {$this->address}";
    }

    private function check()
    {
        if ($this->name[0] !== $this->address[0]) {
            echo "***** BROKEN ***** $this\n";
        }
    }
}

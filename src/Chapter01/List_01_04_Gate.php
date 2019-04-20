<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_01_04_Gate extends \Threaded
{
    private $counter;
    private $name;
    private $address;

    public function __construct()
    {
        $this->counter = 0;
        $this->name = 'Nobody';
        $this->address = 'Nowhere';
    }

    public function pass($name, $address)
    {
        $this->synchronized(
            \Closure::fromCallable([$this, 'passImpl']),
            $name,
            $address
        );
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
        return $this->synchronized(
            \Closure::fromCallable([$this, '__toStringImpl'])
        );
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

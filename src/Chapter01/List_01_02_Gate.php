<?php
namespace YUti\Dpmt\Chapter01;

class List_01_02_Gate extends \Threaded
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
        $this->counter++;
        $this->name = $name;
        $this->address = $address;
        $this->check();
    }

    public function __toString()
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

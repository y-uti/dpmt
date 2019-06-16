<?php
namespace YUti\Dpmt\Chapter01;

class List_01_15_Tool extends \Threaded
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return "[ {$this->name} ]";
    }
}

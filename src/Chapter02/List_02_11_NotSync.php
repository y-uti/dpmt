<?php
namespace YUti\Dpmt\Chapter02;

class List_02_11_NotSync extends \Threaded
{
    private $name = 'NotSync';

    public function __toString()
    {
        return "[ " . $this->name . "]";
    }
}

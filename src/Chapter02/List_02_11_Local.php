<?php
namespace YUti\Dpmt\Chapter02;

class List_02_11_Local
{
    private $name = 'Local';

    public function __toString()
    {
        return "[ " . $this->name . "]";
    }
}

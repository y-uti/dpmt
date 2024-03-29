<?php
namespace YUti\Dpmt\Chapter02;

class List_02_14_Point extends \Threaded
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function __toString()
    {
        return "({$this->x}, {$this->y})";
    }
}

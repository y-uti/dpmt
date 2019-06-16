<?php
namespace YUti\Dpmt\Chapter02;

class List_02_11_Sync extends \Threaded
{
    private $name = 'Sync';

    public function __toString()
    {
        $this->synchronized(\Closure::fromCallable([$this, '__toStringImpl']));
    }

    private function __toStringImpl()
    {
        return "[ " . $this->name . "]";
    }
}

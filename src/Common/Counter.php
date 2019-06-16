<?php
namespace YUti\Dpmt\Common;

class Counter extends \Threaded
{
    private $count;

    public function __construct()
    {
        $this->count = 0;
    }

    public function get()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'getImpl']));
    }

    private function getImpl()
    {
        return $this->count++;
    }
}

<?php
namespace YUti\Dpmt\Common;

require_once __DIR__ . '/../../vendor/autoload.php';

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

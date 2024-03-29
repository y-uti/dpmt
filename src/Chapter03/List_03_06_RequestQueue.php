<?php
namespace YUti\Dpmt\Chapter03;

use YUti\Dpmt\Common\BlockingQueue;

class List_03_06_RequestQueue extends \Threaded
{
    private $queue;

    public function __construct()
    {
        $this->queue = new BlockingQueue();
    }

    public function getRequest()
    {
        return $this->queue->remove();
    }

    public function putRequest($request)
    {
        $this->queue->offer($request);
    }
}

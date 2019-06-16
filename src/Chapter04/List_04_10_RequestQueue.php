<?php
namespace YUti\Dpmt\Chapter04;

class List_04_10_RequestQueue extends \Threaded
{
    private $queue;
    private $timeout;

    public function __construct($timeout)
    {
        $this->queue = new List_04_10_BlockingQueue();
        $this->timeout = $timeout;
    }

    public function getRequest()
    {
        return $this->queue->remove($this->timeout);
    }

    public function putRequest($request)
    {
        $this->queue->offer($request);
    }
}

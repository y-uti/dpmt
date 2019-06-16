<?php
namespace YUti\Dpmt\Chapter03;

use YUti\Dpmt\Common\Queue;

class List_03_11_RequestQueue extends \Threaded
{
    private $queue;

    public function __construct()
    {
        $this->queue = new Queue();
    }

    public function getRequest()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'getRequestImpl']));
    }

    private function getRequestImpl()
    {
        while ($this->queue->peek() === null) {
            usleep(100000);
        }

        return $this->queue->remove();
    }

    public function putRequest($request)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'putRequestImpl']), $request);
    }

    private function putRequestImpl($request)
    {
        $this->queue->offer($request);
        $this->notify();
    }
}

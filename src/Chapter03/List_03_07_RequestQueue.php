<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Queue;

class List_03_07_RequestQueue extends \Threaded
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
            $this->wait();
        }

        return $this->queue->remove();
    }

    public function putRequest($request)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'putRequestImpl']), $request);
    }

    private function putRequestImpl($request)
    {
        $this->notify();
        usleep(1000 * rand(1, 1000));
        $this->queue->offer($request);
    }
}

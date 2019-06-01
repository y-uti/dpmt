<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Queue;

class List_03_09_RequestQueue extends \Threaded
{
    private $queue;

    public function __construct()
    {
        $this->queue = new Queue();
    }

    public function getRequest()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'getRequestImpl']));

        usleep(1000 * rand(1, 1000));

        return $this->queue->remove();
    }

    private function getRequestImpl()
    {
        while ($this->queue->peek() === null) {
            $this->wait();
        }
    }

    public function putRequest($request)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'putRequestImpl']), $request);
    }

    private function putRequestImpl($request)
    {
        $this->queue->offer($request);
        $this->notify();

        usleep(1000 * rand(1, 1000));
    }
}

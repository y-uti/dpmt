<?php
namespace YUti\Dpmt\Chapter08;

use YUti\Dpmt\Common\BlockingQueue;

class List_08_04_Channel extends \Threaded
{
    private static $maxRequest = 100;

    private $requestQueue;
    private $threadPool;

    public function __construct($threads)
    {
        $this->requestQueue = new BlockingQueue(self::$maxRequest);
        $this->threadPool = [];
        for ($i = 0; $i < $threads; $i++) {
            $this->threadPool[] = new List_08_05_WorkerThread("Worker-$i", $this);
        }
    }

    public function startWorkers()
    {
        foreach ($this->threadPool as $t) {
            $t->start();
        }
    }

    public function putRequest($request)
    {
        $this->requestQueue->offer($request);
    }

    public function takeRequest()
    {
        return $this->requestQueue->remove();
    }
}

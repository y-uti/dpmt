<?php
namespace YUti\Dpmt\Chapter04;

use YUti\Dpmt\Common\Queue;

class List_04_09_RequestQueue extends \Threaded
{
    private $queue;
    private $timeout;

    public function __construct($timeout)
    {
        $this->queue = new Queue();
        $this->timeout = $timeout;

        new List_04_08_LivenessException();
    }

    public function getRequest()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'getRequestImpl']));
    }

    private function getRequestImpl()
    {
        $start = (int) (microtime(true) * 1e6);
        while ($this->queue->peek() === null) {
            $now = (int) (microtime(true) * 1e6);
            $rest = $this->timeout - ($now - $start);
            if ($rest <= 0) {
                throw new List_04_08_LivenessException("rest = $rest, timeout = {$this->timeout}");
            }
            $this->wait($rest);
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

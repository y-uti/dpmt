<?php
namespace YUti\Dpmt\Chapter04;

use YUti\Dpmt\Common\Queue;

class List_04_10_BlockingQueue extends \Threaded
{
    private $queue;

    public function __construct()
    {
        $this->queue = new Queue();

        new List_04_08_LivenessException();
    }

    public function isEmpty()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'isEmptyImpl']));
    }

    private function isEmptyImpl()
    {
        return $this->queue->isEmpty();
    }

    public function offer($value)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'offerImpl']), $value);
    }

    private function offerImpl($value)
    {
        $this->queue->offer($value);
        $this->notify();
    }

    public function peek()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'peekImpl']));
    }

    private function peekImpl()
    {
        return $this->queue->peek();
    }

    public function remove($timeout)
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'removeImpl']), $timeout);
    }

    private function removeImpl($timeout)
    {
        $start = (int) (microtime(true) * 1e6);
        while ($this->queue->peek() === null) {
            $now = (int) (microtime(true) * 1e6);
            $rest = $timeout - ($now - $start);
            if ($rest <= 0) {
                throw new List_04_08_LivenessException("rest = $rest, timeout = $timeout");
            }
            $this->wait($rest);
        }

        return $this->queue->remove();
    }
}

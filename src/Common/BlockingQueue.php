<?php
namespace YUti\Dpmt\Common;

require_once __DIR__ . '/../../vendor/autoload.php';

class BlockingQueue extends \Threaded
{
    private $queue;

    public function __construct()
    {
        $this->queue = new Queue();
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

    public function remove()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'removeImpl']));
    }

    private function removeImpl()
    {
        while ($this->queue->peek() === null) {
            $this->wait();
        }

        return $this->queue->remove();
    }
}

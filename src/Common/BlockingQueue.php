<?php
namespace YUti\Dpmt\Common;

require_once __DIR__ . '/../../vendor/autoload.php';

class BlockingQueue extends \Threaded
{
    private $queue;

    public function __construct($capacity = 0)
    {
        $this->queue = new Queue($capacity);
    }

    public function count()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'countImpl']));
    }

    private function countImpl()
    {
        return $this->queye->count();
    }

    public function capacity()
    {
        return $this->queue->capacity();
    }

    public function isEmpty()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'isEmptyImpl']));
    }

    private function isEmptyImpl()
    {
        return $this->queue->isEmpty();
    }

    public function isFull()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'isFullImpl']));
    }

    private function isFullImpl()
    {
        return $this->queue->isFull();
    }

    public function offer($value)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'offerImpl']), $value);
    }

    private function offerImpl($value)
    {
        while ($this->isFullImpl()) {
            $this->wait();
        }

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
        while ($this->isEmptyImpl()) {
            $this->wait();
        }

        $value = $this->queue->remove();
        $this->notify();

        return $value;
    }
}

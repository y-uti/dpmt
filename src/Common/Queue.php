<?php
namespace YUti\Dpmt\Common;

require_once __DIR__ . '/../../vendor/autoload.php';

class Queue extends \Threaded
{
    private $capacity;
    private $data;
    private $head;
    private $tail;
    private $count;
    
    public function __construct($capacity = 0)
    {
        $this->capacity = $capacity;
        $this->data = new \Volatile();
        $this->head = 0;
        $this->tail = 0;
        $this->count = 0;
    }

    public function count()
    {
        return $this->count;
    }

    public function capacity()
    {
        return $this->capacity;
    }

    private function hasCapacity()
    {
        return $this->capacity > 0;
    }

    public function isEmpty()
    {
        return $this->count === 0;
    }

    public function isFull()
    {
        return $this->hasCapacity() && $this->count === $this->capacity;
    }

    public function offer($value)
    {
        if ($this->isFull()) {
            return null;
        }
        $this->data[$this->tail++] = $value;
        if ($this->hasCapacity()) {
            $this->tail = $this->tail % $this->capacity;
        }
        $this->count++;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->data[$this->head];
    }

    public function remove()
    {
        if ($this->isEmpty()) {
            return null;
        }

        $value = $this->data[$this->head];
        unset($this->data[$this->head]);
        $this->head++;
        if ($this->hasCapacity()) {
            $this->head = $this->head % $this->capacity;
        }
        $this->count--;

        return $value;
    }
}

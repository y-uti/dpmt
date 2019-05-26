<?php
namespace YUti\Dpmt\Common;

require_once __DIR__ . '/../../vendor/autoload.php';

class Queue extends \Threaded
{
    private $data;
    private $head;
    private $tail;

    public function __construct()
    {
        $this->data = new \Volatile();
        $this->head = 0;
        $this->tail = 0;
    }

    public function isEmpty()
    {
        return $this->head === $this->tail;
    }

    public function offer($value)
    {
        $this->data[$this->head++] = $value;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->data[$this->tail];
    }

    public function remove()
    {
        if ($this->isEmpty()) {
            return null;
        }

        $tail = $this->tail++;
        $value = $this->data[$tail];
        unset($this->data[$tail]);

        return $value;
    }
}

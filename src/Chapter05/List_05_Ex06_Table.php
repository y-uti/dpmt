<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_Ex06_Table extends \Threaded
{
    private $buffer;
    private $head;
    private $tail;
    private $count;

    private $closed;

    public function __construct($count)
    {
        $this->buffer = array_fill(0, $count, null);
        $this->head = 0;
        $this->tail = 0;
        $this->count = 0;
        $this->closed = false;
    }

    public function close()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'closeImpl']));
    }

    private function closeImpl()
    {
        $this->closed = true;
        $this->notify();
    }

    public function isClosed()
    {
        return $this->closed;
    }

    public function put($cake)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'putImpl']), $cake);
    }

    private function putImpl($cake)
    {
        while (!$this->closed && $this->count >= count($this->buffer)) {
            $this->wait();
        }

        if ($this->closed) {
            return;
        }

        $threadId = \Thread::getCurrentThreadId();
        echo "$threadId puts $cake\n";

        $this->buffer[$this->tail] = $cake;
        $this->tail = ($this->tail + 1) % count($this->buffer);
        $this->count++;
        $this->notify();
    }

    public function take()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'takeImpl']));
    }

    private function takeImpl()
    {
        while (!$this->closed && $this->count <= 0) {
            $this->wait();
        }

        if ($this->closed) {
            return false;
        }

        $cake = $this->buffer[$this->head];
        $this->head = ($this->head + 1) % count($this->buffer);
        $this->count--;
        $this->notify();
        
        $threadId = \Thread::getCurrentThreadId();
        echo "$threadId takes $cake\n";

        return $cake;
    }
}

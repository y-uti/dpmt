<?php
namespace YUti\Dpmt\Chapter05;

class List_05_Ex04_Table extends \Threaded
{
    private $buffer;
    private $head;
    private $tail;
    private $count;

    public function __construct($count)
    {
        $this->buffer = array_fill(0, $count, null);
        $this->head = 0;
        $this->tail = 0;
        $this->count = 0;
    }

    public function put($cake)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'putImpl']), $cake);
    }

    private function putImpl($cake)
    {
        $threadId = \Thread::getCurrentThreadId();

        while ($this->count >= count($this->buffer)) {
            echo "$threadId $cake waiting\n";
            $this->wait();
            echo "$threadId $cake notified\n";
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
        $threadId = \Thread::getCurrentThreadId();

        while ($this->count <= 0) {
            echo "$threadId waiting\n";
            $this->wait();
            echo "$threadId notified\n";
        }

        $cake = $this->buffer[$this->head];
        $this->head = ($this->head + 1) % count($this->buffer);
        $this->count--;
        $this->notify();
        
        echo "$threadId takes $cake\n";

        return $cake;
    }
}

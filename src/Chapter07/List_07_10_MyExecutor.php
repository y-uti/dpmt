<?php
namespace YUti\Dpmt\Chapter07;

class List_07_10_MyExecutor implements List_07_09_Executor
{
    private $threads;

    public function __construct()
    {
        $this->threads = [];
    }

    public function execute($runnable)
    {
        $thread = new List_07_05_Thread($runnable);
        $thread->start();

        $this->threads[] = $thread;
    }
}

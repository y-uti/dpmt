<?php
namespace YUti\Dpmt\Chapter09;

class List_09_02_Host extends \Threaded
{
    private $threads;

    public function __construct()
    {
        $this->threads = [];

        new List_09_05_RealData(0, '');
    }

    public function request($count, $c)
    {
        echo "    request($count, $c) BEGIN\n";

        $future = new List_09_04_FutureData();
        $thread = new List_09_02_WorkerThread($this, $count, $c, $future);
        $thread->start();
        $this->threads[] = $thread;

        echo "    request($count, $c) END\n";

        return $future;
    }

    public function shutdown()
    {
        $this->notify();
    }
}

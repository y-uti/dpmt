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

        $thread = new class($count, $c, $future) extends \Thread {
            private $count;
            private $c;
            private $future;
            private $realData;
            public function __construct($count, $c, $future)
            {
                $this->count = $count;
                $this->c = $c;
                $this->future = $future;
                $this->realData = null;
            }
            public function run()
            {
                $this->realData = new List_09_05_RealData($this->count, $this->c);
                $this->future->setRealData($this->realData);
            }
        };
        $thread->start();
        $this->threads[] = $thread;

        echo "    request($count, $c) END\n";

        return $future;
    }
}

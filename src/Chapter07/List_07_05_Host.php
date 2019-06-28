<?php
namespace YUti\Dpmt\Chapter07;

class List_07_05_Host
{
    private $helper;
    private $threads;

    public function __construct()
    {
        $this->helper = new List_07_03_Helper();
        $this->threads = [];
    }

    public function request($count, $c)
    {
        echo "    request($count, $c) BEGIN\n";
        $runnable = new class($this->helper, $count, $c) extends \Threaded implements List_07_05_Runnable {
            private $helper;
            private $count;
            private $c;
            public function __construct($helper, $count, $c)
            {
                $this->helper = $helper;
                $this->count = $count;
                $this->c = $c;
            }

            public function run()
            {
                $this->helper->handle($this->count, $this->c);
            }
        };
        $thread = new List_07_05_Thread($runnable);
        $thread->start();
        echo "    request($count, $c) END\n";

        $this->threads[] = $thread;
    }
}

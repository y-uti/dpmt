<?php
namespace YUti\Dpmt\Chapter07;

class List_07_06_Host
{
    private $helper;
    private $threads;

    private $threadFactory;

    public function __construct($threadFactory)
    {
        $this->helper = new List_07_03_Helper();
        $this->threads = [];

        $this->threadFactory = $threadFactory;
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
        $thread = $this->threadFactory->newThread($runnable);
        $thread->start();
        echo "    request($count, $c) END\n";

        $this->threads[] = $thread;
    }
}

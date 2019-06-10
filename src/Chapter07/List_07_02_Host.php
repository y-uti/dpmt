<?php
namespace YUti\Dpmt\Chapter07;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_07_02_Host
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
        $thread = new class($this->helper, $count, $c) extends \Thread {
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
        $thread->start();
        echo "    request($count, $c) END\n";

        $this->threads[] = $thread;
    }
}

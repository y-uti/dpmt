<?php
namespace YUti\Dpmt\Chapter07;

class List_07_09_Host
{
    private $helper;
    private $executor;

    public function __construct($executor)
    {
        $this->helper = new List_07_03_Helper();
        $this->executor = $executor;
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
        $this->executor->execute($runnable);
        echo "    request($count, $c) END\n";
    }
}

<?php
namespace YUti\Dpmt\Chapter07;

class List_07_a2_Host
{
    private $helper;
    private $threads;

    public function __construct()
    {
        $this->helper = new List_07_a2_Helper();
        $this->threads = [];
    }

    public function request($count, $c)
    {
        echo "    request($count, $c) BEGIN\n";
        $thread = new List_07_a2_HelperThread($this->helper, $count, $c);
        $thread->start();
        echo "    request($count, $c) END\n";

        $this->threads[] = $thread;
    }
}

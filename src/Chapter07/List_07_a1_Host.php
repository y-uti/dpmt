<?php
namespace YUti\Dpmt\Chapter07;

class List_07_a1_Host
{
    private $helper;

    public function __construct()
    {
        $this->helper = new List_07_a1_Helper();
    }

    public function request($count, $c)
    {
        echo "    request($count, $c) BEGIN\n";
        $this->helper->handle($count, $c);
        echo "    request($count, $c) END\n";
    }
}

<?php
namespace YUti\Dpmt\Chapter09;

class List_09_05_RealData extends \Threaded implements List_09_03_Data
{
    private $content;

    public function __construct($count, $c)
    {
        if ($count === 0) {
            return;
        }

        echo "        making RealData($count, $c) BEGIN\n";

        $buffer = '';
        for ($i = 0; $i < $count; $i++) {
            $buffer .= $c;
            usleep(100000);
        }
        $this->content = $buffer;

        echo "        making RealData($count, $c) END\n";
    }

    public function getContent()
    {
        return $this->content;
    }
}

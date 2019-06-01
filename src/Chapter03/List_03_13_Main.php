<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_03_13_Main
{
    public static function main(array $argv)
    {
        $queue1 = new List_03_02_RequestQueue();
        $queue2 = new List_03_02_RequestQueue();
        $alice = new List_03_12_TalkThread($queue1, $queue2, 'Alice');
        $bobby = new List_03_12_TalkThread($queue2, $queue1, 'Bobby');
        $alice->start();
        $bobby->start();

        $queue1->putRequest(new List_03_01_Request('Hello'));
    }
}

if (isset($argv)) {
    List_03_13_Main::main($argv);
}

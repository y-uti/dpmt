<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_03_07_Main
{
    public static function main(array $argv)
    {
        $queue = new List_03_07_RequestQueue();
        $alice = new List_03_03_ClientThread($queue, 'Alice');
        $bobby = new List_03_04_ServerThread($queue, 'Bobby');
        $chris = new List_03_04_ServerThread($queue, 'Chris');
        $alice->start();
        $bobby->start();
        $chris->start();
    }
}

if (isset($argv)) {
    List_03_07_Main::main($argv);
}

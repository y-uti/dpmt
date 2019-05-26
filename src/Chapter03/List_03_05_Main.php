<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_03_05_Main
{
    public static function main(array $argv)
    {
        $queue = new List_03_02_RequestQueue();
        $client = new List_03_03_ClientThread($queue, 'Alice');
        $server = new List_03_04_ServerThread($queue, 'Bobby');
        $client->start();
        $server->start();
    }
}

if (isset($argv)) {
    List_03_05_Main::main($argv);
}

<?php
namespace YUti\Dpmt\Chapter04;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Chapter03\List_03_03_ClientThread;
use YUti\Dpmt\Chapter03\List_03_04_ServerThread;

class List_04_09_Main
{
    public static function main(array $argv)
    {
        $queue = new List_04_09_RequestQueue(100000);
        $client = new List_03_03_ClientThread($queue, 'Alice');
        $server = new List_03_04_ServerThread($queue, 'Bobby');
        $client->start();
        $server->start();
    }
}

if (isset($argv)) {
    List_04_09_Main::main($argv);
}

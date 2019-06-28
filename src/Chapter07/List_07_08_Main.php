<?php
namespace YUti\Dpmt\Chapter07;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_07_08_Main
{
    public static function main(array $argv)
    {
        echo "main BEGIN\n";
        $threadFactory = List_07_08_Executors::defaultThreadFactory();
        $host = new List_07_06_Host($threadFactory);
        $host->request(10, 'A');
        $host->request(20, 'B');
        $host->request(30, 'C');
        echo "main END\n";
    }
}

if (isset($argv)) {
    List_07_08_Main::main($argv);
}

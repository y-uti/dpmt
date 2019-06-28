<?php
namespace YUti\Dpmt\Chapter07;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_07_10_Main
{
    public static function main(array $argv)
    {
        echo "main BEGIN\n";
        $executor = new List_07_10_MyExecutor();
        $host = new List_07_09_Host($executor);
        $host->request(10, 'A');
        $host->request(20, 'B');
        $host->request(30, 'C');
        echo "main END\n";
    }
}

if (isset($argv)) {
    List_07_10_Main::main($argv);
}

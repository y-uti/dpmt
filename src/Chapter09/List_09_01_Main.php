<?php
namespace YUti\Dpmt\Chapter09;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_09_01_Main
{
    public static function main(array $argv)
    {
        echo "main BEGIN\n";

        $host = new List_09_02_Host();
        $data1 = $host->request(10, 'A');
        $data2 = $host->request(20, 'B');
        $data3 = $host->request(30, 'C');

        echo "main otherJob BEGIN\n";
        usleep(2000000);
        echo "main otherJob END\n";

        echo "data1 = {$data1->getContent()}\n";
        echo "data2 = {$data2->getContent()}\n";
        echo "data3 = {$data3->getContent()}\n";

        $host->shutdown();

        echo "main END\n";
    }
}

if (isset($argv)) {
    List_09_01_Main::main($argv);
}

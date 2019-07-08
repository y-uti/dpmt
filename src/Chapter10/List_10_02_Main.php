<?php
namespace YUti\Dpmt\Chapter10;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_10_02_Main
{
    public static function main(array $argv)
    {
        echo "main: BEGIN\n";

        $t = new List_10_01_CountupThread();
        $t->start();

        usleep(10000000);

        echo "main: shutdownRequest\n";
        $t->shutdownRequest();

        echo "main: join\n";
        $t->join();

        echo "main: END\n";
    }
}

if (isset($argv)) {
    List_10_02_Main::main($argv);
}

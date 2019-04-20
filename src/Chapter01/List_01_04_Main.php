<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_01_04_Main
{
    public static function main(array $argv)
    {
        echo "Testing Gate, hit CTRL+C to exit.\n";

        $gate = new List_01_04_Gate();
        $alice = new List_01_03_UserThread($gate, 'Alice', 'Alaska');
        $bobby = new List_01_03_UserThread($gate, 'Bobby', 'Brazil');
        $chris = new List_01_03_UserThread($gate, 'Chris', 'Canada');
        $alice->start();
        $bobby->start();
        $chris->start();
    }
}

if (isset($argv)) {
    List_01_04_Main::main($argv);
}

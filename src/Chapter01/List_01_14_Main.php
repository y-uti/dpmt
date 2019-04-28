<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_01_14_Main
{
    public static function main(array $argv)
    {
        echo "Testing EaterThread, hit CTRL+C to exit.\n";

        $spoon = new List_01_15_Tool('Spoon');
        $fork = new List_01_15_Tool('Fork');
        $alice = new List_01_16_EaterThread('Alice', $spoon, $fork);
        $bobby = new List_01_16_EaterThread('Bobby', $fork, $spoon);
        $alice->start();
        $bobby->start();
    }
}

if (isset($argv)) {
    List_01_14_Main::main($argv);
}

<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_14_Main
{
    public static function main(array $argv)
    {
        $start = new List_02_14_Point(1, 2);
        $end = new List_02_14_Point(3, 4);
        $line = new List_02_13_Line($start, $end);

        echo $line, PHP_EOL;

        $start->x = 5;

        echo $line, PHP_EOL;
    }
}

if (isset($argv)) {
    List_02_14_Main::main($argv);
}

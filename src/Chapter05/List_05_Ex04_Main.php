<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Counter;

class List_05_Ex04_Main
{
    public static function main(array $argv)
    {
        $table = new List_05_Ex04_Table(3);
        $counter = new Counter();

        $threads = [];
        $threads[] = new List_05_02_MakerThread('MakerThread-1', $table, $counter);
        $threads[] = new List_05_02_MakerThread('MakerThread-2', $table, $counter);
        $threads[] = new List_05_02_MakerThread('MakerThread-3', $table, $counter);
        $threads[] = new List_05_03_EaterThread('EaterThread-1', $table);
        $threads[] = new List_05_03_EaterThread('EaterThread-2', $table);
        $threads[] = new List_05_03_EaterThread('EaterThread-3', $table);

        foreach ($threads as $t) {
            $t->start();
        }
    }
}

if (isset($argv)) {
    List_05_Ex04_Main::main($argv);
}

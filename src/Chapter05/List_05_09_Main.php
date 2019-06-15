<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Counter;

class List_05_09_Main
{
    public static function main(array $argv)
    {
        $counter = new Counter();

        $threads = [];
        $threads[] = new List_05_02_MakerThread(
            'MakerThread-1',
            new List_05_04_Table(3),
            $counter
        );
        $threads[] = new List_05_03_EaterThread(
            'EaterThread-1',
            new List_05_04_Table(3)
        );

        foreach ($threads as $t) {
            $t->start();
        }
    }
}

if (isset($argv)) {
    List_05_09_Main::main($argv);
}

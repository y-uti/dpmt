<?php
namespace YUti\Dpmt\Chapter04;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_04_04_Main
{
    public static function main(array $argv)
    {
        $data = new List_04_01_Data('data.txt', '(empty)');
        $t1 = new List_04_02_SaverThread('SaverThread', $data);
        $t2 = new List_04_03_ChangerThread('ChangerThread', $data);
        $t1->start();
        $t2->start();
    }
}

if (isset($argv)) {
    List_04_04_Main::main($argv);
}

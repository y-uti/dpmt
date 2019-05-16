<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_02_Main
{
    public static function main(array $argv)
    {
        $alice = new List_02_01_Person('Alice', 'Alaska');
        $t1 = new List_02_03_PrintPersonThread($alice);
        $t2 = new List_02_03_PrintPersonThread($alice);
        $t3 = new List_02_03_PrintPersonThread($alice);
        $t1->start();
        $t2->start();
        $t3->start();
    }
}

if (isset($argv)) {
    List_02_02_Main::main($argv);
}

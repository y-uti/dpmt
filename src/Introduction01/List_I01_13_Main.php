<?php
namespace YUti\Dpmt\Introduction01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_I01_13_Main
{
    public static function main(array $argv)
    {
        $bank = new List_I01_13_Bank('Alice', 100);
        $t1 = new List_I01_13_MyThread($bank);
        $t2 = new List_I01_13_MyThread($bank);
        $t1->start();
        $t2->start();
    }
}

if (isset($argv)) {
    List_I01_13_Main::main($argv);
}

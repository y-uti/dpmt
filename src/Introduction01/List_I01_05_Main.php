<?php
namespace YUti\Dpmt\Introduction01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_I01_05_Main
{
    public static function main(array $argv)
    {
        $t1 = new List_I01_04_PrintThread('Good!');
        $t1->start();
        $t2 = new List_I01_04_PrintThread('Nice!');
        $t2->start();
    }

    public static function thisIsNotWorked(array $argv)
    {
        (new List_I01_04_PrintThread('Good!'))->start();
        (new List_I01_04_PrintThread('Nice!'))->start();
    }
}

if (isset($argv)) {
    List_I01_05_Main::main($argv);
}

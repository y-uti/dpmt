<?php
namespace YUti\Dpmt\Introduction01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_I01_01_Main
{
    public static function main(array $argv)
    {
        for ($i = 0; $i < 10000; $i++) {
            echo 'Good!';
        }
    }
}

if (isset($argv)) {
    List_I01_01_Main::main($argv);
}

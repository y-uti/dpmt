<?php
namespace YUti\Dpmt\Introduction01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_I01_09_Main
{
    public static function main(array $argv)
    {
        for ($i = 0; $i < 10; $i++) {
            echo 'Good!';
            sleep(1);
        }
    }
}

if (isset($argv)) {
    List_I01_09_Main::main($argv);
}

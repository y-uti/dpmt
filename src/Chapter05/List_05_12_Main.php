<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_12_Main
{
    public static function main(array $argv)
    {
        echo microtime(true), PHP_EOL;
        List_05_12_Something::usleep(1000 * 3000);
        echo microtime(true), PHP_EOL;
    }
}

if (isset($argv)) {
    List_05_12_Main::main($argv);
}

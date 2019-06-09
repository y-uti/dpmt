<?php
namespace YUti\Dpmt\Chapter04;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_04_12_Main
{
    public static function main(array $argv)
    {
        $thread = new List_04_11_TestThread();
        while (true) {
            $thread->start();
        }
    }
}

if (isset($argv)) {
    List_04_12_Main::main($argv);
}

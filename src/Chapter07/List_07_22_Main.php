<?php
namespace YUti\Dpmt\Chapter07;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Mutex;

class List_07_22_Main
{
    public static function main(array $argv)
    {
        echo "BEGIN\n";
        $mutex = new Mutex();
        List_07_21_Blackhole::enter($mutex);
        echo "END\n";
    }
}

if (isset($argv)) {
    List_07_22_Main::main($argv);
}

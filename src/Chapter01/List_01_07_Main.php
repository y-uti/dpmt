<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Mutex;

class List_01_07_Main
{
    public static function main(array $argv)
    {
        echo "Testing Mutex, hit CTRL+C to exit.\n";

        $threads = [];
        $mutex = new Mutex();

        foreach (range(1, 5) as $i) {
            $threads[] = new List_01_07_UserThread($i, $mutex);
        }

        foreach ($threads as $t) {
            $t->start();
        }
    }
}

if (isset($argv)) {
    List_01_07_Main::main($argv);
}

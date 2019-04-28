<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_01_11_Main
{
    public static function main(array $argv)
    {
        echo "Testing Semaphore, hit CTRL+C to exit.\n";

        $threads = [];
        $resource = new List_01_11_BoundedResource(3);

        for ($i = 0; $i < 10; $i++) {
            $threads[] = new List_01_11_UserThread($resource);
        }

        foreach ($threads as $t) {
            $t->start();
        }
    }
}

if (isset($argv)) {
    List_01_11_Main::main($argv);
}

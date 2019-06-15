<?php
namespace YUti\Dpmt\Chapter06;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Counter;

class List_06_09_Main
{
    public static function main(array $argv)
    {
        $database = new List_06_09_Database();
        $counter = new Counter();

        $threads = [];
        $threads[] = new List_06_09_AssignThread($database, 'Alice', 'Alaska');
        $threads[] = new List_06_09_AssignThread($database, 'Alice', 'Australia');
        $threads[] = new List_06_09_AssignThread($database, 'Bobby', 'Brazil');
        $threads[] = new List_06_09_AssignThread($database, 'Bobby', 'Bulgaria');
        for ($i = 0; $i < 100; $i++) {
            $threads[] = new List_06_09_RetrieveThread($database, 'Alice', $counter);
            $threads[] = new List_06_09_RetrieveThread($database, 'Bobby', $counter);
        }

        foreach ($threads as $t) {
            $t->start();
        }

        usleep(1000 * 10000);

        $database->close();
    }
}

if (isset($argv)) {
    List_06_09_Main::main($argv);
}

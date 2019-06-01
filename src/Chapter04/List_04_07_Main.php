<?php
namespace YUti\Dpmt\Chapter04;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\TimeoutException;

class List_04_07_Main
{
    public static function main(array $argv)
    {
        $host = new List_04_06_Host(1000 * 1000 * 10);
        try {
            echo "execute BEGIN\n";
            $host->execute();
        } catch (TimeoutException $e) {
            echo "$e\n";
        }
    }
}

if (isset($argv)) {
    List_04_07_Main::main($argv);
}

<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_11_Main
{
    static $callCount = 10000000;

    public static function main(array $argv)
    {
        self::trial('Local', self::$callCount, new List_02_11_Local());
        self::trial('NotSync', self::$callCount, new List_02_11_NotSync());
        self::trial('Sync', self::$callCount, new List_02_11_Sync());
    }

    private static function trial($message, $count, $object)
    {
        echo "$message: BEGIN\n";
        $startTime = microtime(true);
        for ($i = 0; $i < $count; $i++) {
            $object->__toString();
        }
        $endTime = microtime(true);
        echo "$message: END\n";
        echo 'Elapsed time = ' . ($endTime - $startTime) . " sec.\n";
    }
}

if (isset($argv)) {
    List_02_11_Main::main($argv);
}

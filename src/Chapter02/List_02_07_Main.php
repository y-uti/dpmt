<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_07_Main
{
    public static function main(array $argv)
    {
        $array = new \Volatile();
        $writer = new List_02_08_WriterThread($array);
        $reader = new List_02_08_ReaderThread($array);
        $writer->start();
        $reader->start();
    }
}

if (isset($argv)) {
    List_02_07_Main::main($argv);
}

<?php
namespace YUti\Dpmt\Chapter06;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_06_07_Main
{
    public static function main(array $argv)
    {
        $data = new List_06_07_Data(10);

        $threads = [
            new List_06_04_ReaderThread($data),
            new List_06_04_ReaderThread($data),
            new List_06_04_ReaderThread($data),
            new List_06_04_ReaderThread($data),
            new List_06_04_ReaderThread($data),
            new List_06_04_ReaderThread($data),
            new List_06_03_WriterThread($data, implode(range('A', 'Z'))),
            new List_06_03_WriterThread($data, implode(range('a', 'z'))),
        ];

        foreach ($threads as $t) {
            $t->start();
        }
    }
}

if (isset($argv)) {
    List_06_07_Main::main($argv);
}

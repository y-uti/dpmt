<?php
namespace YUti\Dpmt\Chapter04;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_04_05_Main
{
    public static function main(array $argv)
    {
        $something = new List_04_05_Something();
        $alice = new List_04_05_UserThread($something, 'Alice');
        $bobby = new List_04_05_UserThread($something, 'Bobby');
        $chris = new List_04_05_UserThread($something, 'Chris');
        $alice->start();
        $bobby->start();
        $chris->start();
    }
}

if (isset($argv)) {
    List_04_05_Main::main($argv);
}

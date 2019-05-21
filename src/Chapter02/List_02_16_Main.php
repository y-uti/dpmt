<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_16_Main
{
    public static function main(array $argv)
    {
        $mutablePerson = new List_02_15_MutablePerson('Alice', 'Alaska');
        echo $mutablePerson, PHP_EOL;

        $immutablePerson = new List_02_16_ImmutablePerson($mutablePerson);
        echo $immutablePerson, PHP_EOL;

        $thread = new List_02_16_UserThread($mutablePerson);
        $thread->start();

        usleep(0.5 * 1e6);

        $mutablePerson->setPerson('Bobby', 'Brazil');
        echo $mutablePerson, PHP_EOL;
    }
}

if (isset($argv)) {
    List_02_16_Main::main($argv);
}

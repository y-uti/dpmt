<?php
namespace YUti\Dpmt\Chapter08;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_08_a2_Main
{
    public static function main(array $argv)
    {
        $channel = new List_08_a2_Channel();

        $threads[] = new List_08_02_ClientThread('Alice', $channel);
        $threads[] = new List_08_02_ClientThread('Bobby', $channel);
        $threads[] = new List_08_02_ClientThread('Chris', $channel);

        foreach ($threads as $t) {
            $t->start();
        }
    }
}

if (isset($argv)) {
    List_08_a2_Main::main($argv);
}

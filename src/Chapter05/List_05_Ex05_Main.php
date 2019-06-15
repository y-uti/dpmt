<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_Ex05_Main
{
    public static function main(array $argv)
    {
        $table = new List_05_Ex05_Table(3);
        $idManager = new List_05_02_MakerThreadIdManager();

        $threads = [];
        $threads[] = new List_05_02_MakerThread('MakerThread-1', $table, $idManager);
        $threads[] = new List_05_02_MakerThread('MakerThread-2', $table, $idManager);
        $threads[] = new List_05_02_MakerThread('MakerThread-3', $table, $idManager);
        $threads[] = new List_05_03_EaterThread('EaterThread-1', $table);
        $threads[] = new List_05_03_EaterThread('EaterThread-2', $table);
        $threads[] = new List_05_03_EaterThread('EaterThread-3', $table);
        $threads[] = new List_05_Ex05_ClearThread('ClearThread-1', $table);

        foreach ($threads as $t) {
            $t->start();
        }
    }
}

if (isset($argv)) {
    List_05_Ex05_Main::main($argv);
}

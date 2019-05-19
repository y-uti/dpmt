<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_06_ReaderThread extends \Thread
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function run()
    {
        while (true) {
            echo json_encode($this->array), PHP_EOL;
        }
    }
}

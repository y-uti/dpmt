<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_05_WriterThread extends \Thread
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function run()
    {
        for ($i = 0; ; $i++) {
            $this->array[$i] = $i;
            echo "Push $i\n";
            usleep(100000 * rand(1, 5));
            // $this->array->pop();
            // echo "Pop $i\n";
            // usleep(100000 * rand(1, 5));
        }
    }
}

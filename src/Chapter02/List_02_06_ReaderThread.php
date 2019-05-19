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
            foreach ($this->array as $key => $value) {
                echo "$key:$value,";
                usleep(100000 * rand(1, 5));
            }
            echo "END\n";
            usleep(100000 * rand(1, 5));
        }
    }
}

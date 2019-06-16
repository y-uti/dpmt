<?php
namespace YUti\Dpmt\Chapter02;

class List_02_08_ReaderThread extends \Thread
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function run()
    {
        while (true) {
            $this->array->synchronized(\Closure::fromCallable([$this, 'iterateImpl']));
            usleep(100000 * rand(1, 5));
        }
    }

    private function iterateImpl()
    {
        foreach ($this->array as $key => $value) {
            echo "$key:$value,";
            usleep(100000 * rand(1, 5));
        }
        echo "END\n";
    }
}

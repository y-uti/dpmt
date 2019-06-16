<?php
namespace YUti\Dpmt\Chapter02;

class List_02_08_WriterThread extends \Thread
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function run()
    {
        for ($i = 0; ; $i++) {
            $this->array->synchronized(\Closure::fromCallable([$this, 'pushImpl']), $i);
            echo "Push $i\n";
            usleep(100000 * rand(1, 5));
            // $this->array->synchronized(\Closure::fromCallable([$this, 'popImpl']));
            // echo "Pop $i\n";
            // usleep(100000 * rand(1, 5));
        }
    }

    private function pushImpl($i)
    {
        $this->array[$i] = $i;
    }

    private function popImpl()
    {
        $this->array->pop();
    }
}

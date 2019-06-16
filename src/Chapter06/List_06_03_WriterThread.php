<?php
namespace YUti\Dpmt\Chapter06;

class List_06_03_WriterThread extends \Thread
{
    private $data;
    private $filler;
    private $index;

    public function __construct($data, $filler)
    {
        $this->data = $data;
        $this->filler = $filler;
        $this->index = 0;
    }

    public function run()
    {
        while (true) {
            $c = $this->nextchar();
            $this->data->write($c);
            usleep(1000 * rand(1, 3000));
        }
    }

    private function nextchar()
    {
        $c = $this->filler[$this->index++];
        $this->index %= strlen($this->filler);

        return $c;
    }
}

<?php
namespace YUti\Dpmt\Chapter04;

class List_04_02_SaverThread extends \Thread
{
    private $name;
    private $data;

    public function __construct($name, $data)
    {
        $this->name = $name;
        $this->data = $data;
    }

    public function run()
    {
        while (true) {
            $this->data->save();
            usleep(1000000);
        }
    }
}

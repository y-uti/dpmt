<?php
namespace YUti\Dpmt\Chapter04;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_04_03_ChangerThread extends \Thread
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
        for ($i = 0; true; $i++) {
            $this->data->change("No. $i");
            usleep(1000 * rand(1, 1000));
            $this->data->save();
        }
    }
}

<?php
namespace YUti\Dpmt\Chapter04;

class List_04_05_UserThread extends \Thread
{
    private $something;
    private $name;

    public function __construct($something, $name)
    {
        $this->something = $something;
        $this->name = $name;
    }

    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            usleep(1000 * rand(1, 1000));
            echo "{$this->name} try to initialize\n";
            $this->something->init($this->name);
        }
    }
}

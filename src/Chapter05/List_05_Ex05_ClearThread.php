<?php
namespace YUti\Dpmt\Chapter05;

class List_05_Ex05_ClearThread extends \Thread
{
    private $name;
    private $table;

    public function __construct($name, $table)
    {
        $this->name = $name;
        $this->table = $table;
    }

    public function run()
    {
        while (true) {
            $this->table->clear();
            usleep(1000 * rand(1, 1000));
        }
    }
}

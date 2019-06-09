<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_03_EaterThread extends \Thread
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
            $cake = $this->table->take();
            usleep(1000 * rand(1, 1000));
        }
    }
}

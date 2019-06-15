<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_Ex06_EaterThread extends \Thread
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
        while (!$this->table->isClosed()) {
            $cake = $this->table->take();
            usleep(1000 * rand(1, 1000));
        }

        echo "{$this->name}: done\n";
    }
}

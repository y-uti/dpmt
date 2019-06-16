<?php
namespace YUti\Dpmt\Chapter05;

class List_05_02_MakerThread extends \Thread
{
    private $name;
    private $table;
    private $counter;

    public function __construct($name, $table, $counter)
    {
        $this->name = $name;
        $this->table = $table;
        $this->counter = $counter;
    }

    public function run()
    {
        while (true) {
            usleep(1000 * rand(1, 1000));
            $cake = "[ Cake No. {$this->nextId()} by {$this->name} ]";
            $this->table->put($cake);
        }
    }

    private function nextId()
    {
        return $this->counter->get();
    }
}

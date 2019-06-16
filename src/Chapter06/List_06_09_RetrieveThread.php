<?php
namespace YUti\Dpmt\Chapter06;

class List_06_09_RetrieveThread extends \Thread
{
    private $database;
    private $key;
    private $counter;

    public function __construct($database, $key, $counter)
    {
        $this->database = $database;
        $this->key = $key;
        $this->counter = $counter;
    }

    public function run()
    {
        while ($this->database->isConnected()) {
            $value = $this->database->retrieve($this->key);
            $count = $this->counter->get();
            echo "$count: {$this->key} => $value\n";
        }
    }
}

<?php
namespace YUti\Dpmt\Chapter06;

class List_06_09_AssignThread extends \Thread
{
    private $database;
    private $key;
    private $value;

    public function __construct($database, $key, $value)
    {
        $this->database = $database;
        $this->key = $key;
        $this->value = $value;
    }

    public function run()
    {
        $threadId = $this->getThreadId();

        while ($this->database->isConnected()) {
            echo "$threadId: assign {$this->key} => {$this->value}\n";
            $this->database->assign($this->key, $this->value);
            usleep(1000 * rand(1, 1000));
        }
    }
}

<?php
namespace YUti\Dpmt\Chapter02;

class List_02_03_PrintPersonThread extends \Thread
{
    private $person;

    public function __construct($person)
    {
        $this->person = $person;
    }

    public function run()
    {
        while (true) {
            $threadId = $this->getThreadId();
            echo "{$this->getThreadId()} prints {$this->person}\n";
            sleep(rand(1, 3));
        }
    }
}

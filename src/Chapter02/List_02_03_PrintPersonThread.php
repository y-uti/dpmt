<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

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

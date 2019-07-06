<?php
namespace YUti\Dpmt\Chapter08;

class List_08_03_Request extends \Threaded
{
    private $name;
    private $number;

    public function __construct($name, $number)
    {
        $this->name = $name;
        $this->number = $number;
    }

    public function execute()
    {
        $thread = \Thread::getCurrentThread();

        echo "{$thread->getName()} execute $this\n";
        usleep(1000 * rand(1, 1000));
    }

    public function __toString()
    {
        return "[ Request from {$this->name} No. {$this->number} ]";
    }
}

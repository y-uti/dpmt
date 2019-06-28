<?php
namespace YUti\Dpmt\Chapter07;

class List_07_05_Thread extends \Thread
{
    private $runnable;

    public function __construct($runnable)
    {
        $this->runnable = $runnable;
    }

    public function run()
    {
        $this->runnable->run();
    }
}

<?php
namespace YUti\Dpmt\Chapter10;

class List_10_01_CountupThread extends \Thread
{
    private $counter;
    private $shutdownRequested;

    public function __construct()
    {
        $this->counter = 0;
        $this->shutdownRequested = false;
    }

    public function shutdownRequest()
    {
        $this->shutdownRequested = true;
    }

    public function isShutdownRequested()
    {
        return $this->shutdownRequested;
    }

    public function run()
    {
        while (!$this->isShutdownRequested()) {
            $this->doWork();
        }

        $this->doShutdown();
    }

    private function doWork()
    {
        $this->counter++;
        echo "doWork: counter = {$this->counter}\n";

        usleep(500000);
    }

    private function doShutdown()
    {
        echo "doShutdown: counter = {$this->counter}\n";
    }
}

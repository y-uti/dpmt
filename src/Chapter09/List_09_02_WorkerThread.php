<?php
namespace YUti\Dpmt\Chapter09;

class List_09_02_WorkerThread extends \Thread
{
    private $host;
    private $count;
    private $c;
    private $future;

    public function __construct($host, $count, $c, $future)
    {
        $this->host = $host;
        $this->count = $count;
        $this->c = $c;
        $this->future = $future;
    }

    public function run()
    {
        $realData = new List_09_05_RealData($this->count, $this->c);
        $this->future->setRealData($realData);

        $this->host->synchronized(
            function ($host) {
                $host->wait();
            },
            $this->host
        );
    }
}

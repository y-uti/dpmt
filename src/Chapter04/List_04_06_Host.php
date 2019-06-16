<?php
namespace YUti\Dpmt\Chapter04;

use YUti\Dpmt\Common\TimeoutException;

class List_04_06_Host extends \Threaded
{
    private $timeout;
    private $ready;

    public function __construct($timeout)
    {
        $this->timeout = $timeout;
        $this->ready = false;
    }

    public function setExecutable($on)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'setExecutableImpl']), $on);
    }

    private function setExecutableImpl($on)
    {
        $this->ready = $on;
        $this->notify();
    }

    public function execute()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'executeImpl']));
    }

    private function executeImpl()
    {
        $start = microtime(true) * 1e6;
        while (!$this->ready) {
            $now = microtime(true) * 1e6;
            $rest = $this->timeout - ($now - $start);
            if ($rest <= 0) {
                throw new TimeoutException("rest = $rest, timeout = {$this->timeout}");
            }
            $this->wait(1000 * 1000);
        }
        $this->doExecute();
    }

    private function doExecute()
    {
        $threadId = \Thread::getCurrentThreadId();
        echo "$threadId calls doExecute\n";
    }
}

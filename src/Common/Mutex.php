<?php
namespace YUti\Dpmt\Common;

class Mutex extends \Threaded
{
    private $locked;
    private $ownerThreadId;

    public function __construct()
    {
        $this->locked = false;
        $this->ownerThreadId = 0;
    }

    public function lock()
    {
        $this->synchronized(
            \Closure::fromCallable([$this, 'lockImpl'])
        );
    }

    private function lockImpl()
    {
        $currentThreadId = \Thread::getCurrentThreadId();

        while ($this->locked && $this->ownerThreadId !== $currentThreadId) {
            $this->wait();
        }

        $this->locked = true;
        $this->ownerThreadId = $currentThreadId;
    }

    public function unlock()
    {
        return $this->synchronized(
            \Closure::fromCallable([$this, 'unlockImpl'])
        );
    }

    private function unlockImpl()
    {
        $currentThreadId = \Thread::getCurrentThreadId();

        if (!$this->locked || $this->ownerThreadId !== $currentThreadId) {
            return;
        }

        $this->locked = false;
        $this->ownerThreadId = 0;
    }
}

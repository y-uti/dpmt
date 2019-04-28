<?php
namespace YUti\Dpmt\Common;

require_once __DIR__ . '/../../vendor/autoload.php';

class Semaphore extends \Threaded
{
    private $permits;
    private $ownerThreadIds;

    public function __construct($permits)
    {
        $this->permits = $permits;
        $this->ownerThreadIds = [];
    }

    public function acquire()
    {
        $this->synchronized(
            \Closure::fromCallable([$this, 'acquireImpl'])
        );
    }

    private function acquireImpl()
    {
        $currentThreadId = \Thread::getCurrentThreadId();

        if (array_key_exists($currentThreadId, $this->ownerThreadIds)) {
            return;
        }

        while (count($this->ownerThreadIds) === $this->permits) {
            $this->wait();
        }

        $this->ownerThreadIds[$currentThreadId] = true;
    }

    public function release()
    {
        return $this->synchronized(
            \Closure::fromCallable([$this, 'releaseImpl'])
        );
    }

    private function releaseImpl()
    {
        $currentThreadId = \Thread::getCurrentThreadId();
        if (array_key_exists($currentThreadId, $this->ownerThreadIds)) {
            unset($this->ownerThreadIds[$currentThreadId]);
            $this->notify();
            return true;
        }

        return false;
    }

    public function availablePermits()
    {
        return $this->synchronized(
            \Closure::fromCallable([$this, 'availablePermitsImpl'])
        );
    }

    private function availablePermitsImpl()
    {
        return $this->permits - count($this->ownerThreadIds);
    }
}

<?php
namespace YUti\Dpmt\Common;

require_once __DIR__ . '/../../vendor/autoload.php';

class Mutex extends \Threaded
{
    private const NOT_LOCKED = -1;

    private $ownerThreadId;

    public function __construct()
    {
        $this->ownerThreadId = self::NOT_LOCKED;
    }

    public function lock()
    {
        $this->synchronized(
            \Closure::fromCallable([$this, 'lockImpl'])
        );
    }

    private function lockImpl()
    {
        while ($this->ownerThreadId !== self::NOT_LOCKED) {
            $this->wait();
        }

        $currentThreadId = \Thread::getCurrentThreadId();
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
        if ($this->ownerThreadId === $currentThreadId) {
            $this->ownerThreadId = self::NOT_LOCKED;
            $this->notify();
            return true;
        }

        return false;
    }
}

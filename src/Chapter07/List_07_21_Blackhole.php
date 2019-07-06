<?php
namespace YUti\Dpmt\Chapter07;

class List_07_21_Blackhole
{
    private static $threads = [];

    public static function enter($mutex)
    {
        echo "Step 1\n";
        self::magic($mutex);
        echo "Step 2\n";
        $mutex->lock();
        echo "Step 3 (never reached here)\n";
        $mutex->unlock();
    }

    private static function magic($mutex)
    {
        $thread = new class($mutex) extends \Thread {
            private $mutex;

            public function __construct($mutex)
            {
                $this->mutex = $mutex;
            }

            public function run()
            {
                $this->mutex->lock();
                $this->wait();
            }
        };

        $thread->start();

        self::$threads[] = $thread;
    }
}

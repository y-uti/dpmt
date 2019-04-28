<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Mutex;

class List_01_07_UserThread extends \Thread
{
    private $id;
    private $mutex;

    public function __construct($id, $mutex)
    {
        $this->mutex = $mutex;
        $this->id = $id;
    }

    public function run()
    {
        echo "#{$this->id} BEGIN\n";
        while (true) {
            $this->mutex->lock();
            echo "#{$this->id}: locked\n";
            sleep(1);
            $this->mutex->unlock();
            echo "#{$this->id}: unlocked\n";
            sleep(rand(0, 3));
        }
    }
}

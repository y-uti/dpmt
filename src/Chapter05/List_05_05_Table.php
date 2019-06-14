<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\BlockingQueue;

class List_05_05_Table extends BlockingQueue
{
    private $queue;

    public function __construct($count)
    {
        parent::__construct($count);
    }

    public function put($cake)
    {
        $threadId = \Thread::getCurrentThreadId();
        parent::offer($cake);
        echo "$threadId puts $cake\n";
    }

    public function take()
    {
        $cake = parent::remove();
        $threadId = \Thread::getCurrentThreadId();
        echo "$threadId takes $cake\n";
    }
}

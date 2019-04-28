<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_01_11_Log
{
    public function info($message)
    {
        $threadId = \Thread::getCurrentThreadId();
        echo "$threadId: $message\n";
    }
}

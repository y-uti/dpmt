<?php
namespace YUti\Dpmt\Chapter01;

class List_01_11_Log
{
    public function info($message)
    {
        $threadId = \Thread::getCurrentThreadId();
        echo "$threadId: $message\n";
    }
}

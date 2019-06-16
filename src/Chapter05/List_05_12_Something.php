<?php
namespace YUti\Dpmt\Chapter05;

class List_05_12_Something
{
    public static function usleep($time)
    {
        if ($time != 0) {
            $object = new \Threaded();
            $object->synchronized(
                \Closure::fromCallable([List_05_12_Something::class, 'usleepImpl']),
                $object,
                $time
            );
        }
    }

    private static function usleepImpl($object, $time)
    {
        $object->wait($time);
    }
}

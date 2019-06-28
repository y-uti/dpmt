<?php
namespace YUti\Dpmt\Chapter07;

class List_07_08_Executors
{
    private static $defaultThreadFactory;

    public static function defaultThreadFactory()
    {
        if (self::$defaultThreadFactory === null) {
            self::$defaultThreadFactory = self::createDefaultThreadFactory();
        }

        return self::$defaultThreadFactory;
    }

    private static function createDefaultThreadFactory()
    {
        return new class() implements List_07_06_ThreadFactory {
            public function newThread($runnable)
            {
                return new List_07_05_Thread($runnable);
            }
        };
    }
}

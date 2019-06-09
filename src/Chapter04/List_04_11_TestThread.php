<?php
namespace YUti\Dpmt\Chapter04;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_04_11_TestThread extends \Thread
{
    public function run()
    {
        echo 'Begin';
        for ($i = 0; $i < 50; $i++) {
            echo '.';
            usleep(100000);
        }
        echo "End\n";
    }
}

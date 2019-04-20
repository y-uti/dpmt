<?php
namespace YUti\Dpmt\Introduction01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_I01_02_MyThread extends \Thread
{
    public function run()
    {
        for ($i = 0; $i < 10000; $i++) {
            echo 'Nice!';
        }
    }
}

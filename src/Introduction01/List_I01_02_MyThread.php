<?php
namespace YUti\Dpmt\Introduction01;

class List_I01_02_MyThread extends \Thread
{
    public function run()
    {
        for ($i = 0; $i < 10000; $i++) {
            echo 'Nice!';
        }
    }
}

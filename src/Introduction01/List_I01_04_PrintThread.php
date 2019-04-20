<?php
namespace YUti\Dpmt\Introduction01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_I01_04_PrintThread extends \Thread
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function run()
    {
        for ($i = 0; $i < 10000; $i++) {
            echo $this->message;
        }
    }
}

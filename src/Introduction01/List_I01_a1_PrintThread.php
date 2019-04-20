<?php
namespace YUti\Dpmt\Introduction01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_I01_a1_PrintThread extends \Thread
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            echo $this->message;
            sleep(1);
        }
    }
}

class List_I01_a1_Main
{
    public static function main(array $argv)
    {
        $t1 = new List_I01_a1_PrintThread('Good!');
        $t1->start();

        usleep(500000);

        $t2 = new List_I01_a1_PrintThread('Nice!');
        $t2->start();
    }
}

if (isset($argv)) {
    List_I01_a1_Main::main($argv);
}

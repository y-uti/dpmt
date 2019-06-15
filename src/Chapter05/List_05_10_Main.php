<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_10_Main
{
    public static function main(array $argv)
    {
        $host = new List_05_10_Host();

        $thread = new class($host) extends \Thread {
            private $host;
            public function __construct($host)
            {
                $this->host = $host;
            }
            public function run()
            {
                usleep(1000 * 15000);
                $this->host->interrupt();
                echo "interrupt called\n";
            }
        };
        $thread->start();

        $host->execute(10);
    }
}

if (isset($argv)) {
    List_05_10_Main::main($argv);
}

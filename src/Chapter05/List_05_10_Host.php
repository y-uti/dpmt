<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_10_Host extends \Threaded
{
    private $interrupted = false;

    public function interrupt()
    {
        $this->interrupted = true;
    }

    public function execute($count)
    {
        for ($i = 0; $i < $count; $i++) {
            if ($this->interrupted) {
                return;
            }
            $this->doHeavyJob();
        }
    }

    private function doHeavyJob()
    {
        echo "doHeavyJob BEGIN\n";
        $start = microtime(true);
        while (microtime(true) < $start + 10) {
            // Busy loop
        }
        echo "doHeavyJob END\n";
    }
}

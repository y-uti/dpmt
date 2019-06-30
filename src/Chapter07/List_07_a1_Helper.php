<?php
namespace YUti\Dpmt\Chapter07;

class List_07_a1_Helper
{
    public function handle($count, $c)
    {
        echo "        handle($count, $c) BEGIN\n";
        for ($i = 0; $i < $count; $i++) {
            $this->slowly();
            echo $c;
        }
        echo "\n";
        echo "        handle($count, $c) END\n";
    }

    private function slowly()
    {
        usleep(100000);
    }
}

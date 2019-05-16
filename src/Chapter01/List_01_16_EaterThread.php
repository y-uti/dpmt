<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_01_16_EaterThread extends \Thread
{
    private $name;
    private $leftHand;
    private $rightHand;

    public function __construct($name, $leftHand, $rightHand)
    {
        $this->name = $name;
        $this->leftHand = $leftHand;
        $this->rightHand = $rightHand;
    }

    public function run()
    {
        while (true) {
            $this->eat1();
        }
    }

    private function eat1()
    {
        usleep(rand(0, 3000) * 1000);
        $this->leftHand->synchronized(
            function () {
                echo "{$this->name} takes up {$this->leftHand} (left).\n";
                $this->eat2();
                echo "{$this->name} puts down {$this->leftHand} (left).\n";
            }
        );
    }

    private function eat2()
    {
        usleep(rand(0, 500) * 1000);
        $this->rightHand->synchronized(
            function () {
                echo "{$this->name} takes up {$this->rightHand} (right).\n";
                $this->eat3();
                echo "{$this->name} puts down {$this->rightHand} (right).\n";
            }
        );
        usleep(rand(0, 500) * 1000);
    }

    private function eat3()
    {
        echo "{$this->name} is eating now.\n";
        usleep(rand(0, 3000) * 1000);
    }
}

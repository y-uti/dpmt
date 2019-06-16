<?php
namespace YUti\Dpmt\Introduction01;

class List_I01_13_Bank extends \Threaded
{
    private $name;
    private $money;
    private $delay;

    public function __construct($name, $money, $delay = 1)
    {
        $this->name = $name;
        $this->money = $money;
        $this->delay = $delay;
    }

    public function deposit($amount)
    {
        $this->money += $amount;
    }

    public function withdraw($amount)
    {
        if ($this->money >= $amount) {
            sleep($this->delay);
            $this->money -= $amount;
            $this->check();
            return true;
        } else {
            return false;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    private function check()
    {
        if ($this->money < 0) {
            echo "預金残高がマイナスです。(money = $this->money)\n";
        }
    }
}

<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_01_03_UserThread extends \Thread
{
    private $gate;
    private $name;
    private $address;

    public function __construct($gate, $name, $address)
    {
        $this->gate = $gate;
        $this->name = $name;
        $this->address = $address;
    }

    public function run()
    {
        echo "{$this->name} BEGIN\n";
        while (true) {
            $this->gate->pass($this->name, $this->address);
        }
    }
}

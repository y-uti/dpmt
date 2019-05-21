<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_16_ImmutablePerson extends \Threaded
{
    private $name;
    private $address;

    public function __construct(...$args)
    {
        switch (count($args)) {
        case 1:
            $this->constructFromMutable(...$args);
            return;
        case 2:
            $this->constructFromNameAndAddress(...$args);
            return;
        default:
            throw new \InvalidArgumentException();
        }
    }

    private function constructFromNameAndAddress($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    private function constructFromMutable($person)
    {
        $this->name = $person->getName();
        usleep(100000);
        $this->address = $person->getAddress();
    }

    public function getMutablePerson()
    {
        return new List_02_15_MutablePerson($this);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function __toString()
    {
        return "[ ImmutablePerson: {$this->name}, {$this->address} ]";
    }
}

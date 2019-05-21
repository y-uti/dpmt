<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_15_MutablePerson extends \Threaded
{
    private $name;
    private $address;

    public function __construct(...$args)
    {
        switch (count($args)) {
        case 1:
            $this->constructFromImmutable(...$args);
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

    private function constructFromImmutable($person)
    {
        $this->name = $person->getName();
        $this->address = $person->getAddress();
    }

    public function setPerson($name, $address)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'setPersonImpl']), $name, $address);
    }

    private function setPersonImpl($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    public function getImmutablePerson()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'getImmutablePersonImpl']), $this);
    }

    private function getImmutablePersonImpl()
    {
        return new ImmutablePerson($this);
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
        return $this->synchronized(\Closure::fromCallable([$this, '__toStringImpl']));
    }

    private function __toStringImpl()
    {
        return "[ MutablePerson: {$this->name}, {$this->address} ]";
    }
}

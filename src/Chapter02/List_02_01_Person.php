<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

final class List_02_01_Person extends \Threaded
{
    private $name;
    private $address;

    public function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
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
        return "[ Person: name = {$this->name}, address = {$this->address} ]";
    }
}

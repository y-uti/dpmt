<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_03_01_Request extends \Threaded
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return "[ Request {$this->name} ]";
    }
}

<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_16_UserThread extends \Thread
{
    private $person;

    public function __construct($person)
    {
        $this->person = $person;
    }

    public function run()
    {
        $immutablePerson = new List_02_16_ImmutablePerson($this->person);
        echo $immutablePerson, PHP_EOL;
    }
}

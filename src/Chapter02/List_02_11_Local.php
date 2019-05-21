<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_11_Local
{
    private $name = 'Local';

    public function __toString()
    {
        return "[ " . $this->name . "]";
    }
}

<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_11_NotSync extends \Threaded
{
    private $name = 'NotSync';

    public function __toString()
    {
        return "[ " . $this->name . "]";
    }
}

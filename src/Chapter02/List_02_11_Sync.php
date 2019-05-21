<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_11_Sync extends \Threaded
{
    private $name = 'Sync';

    public function __toString()
    {
        $this->synchronized(\Closure::fromCallable([$this, '__toStringImpl']));
    }

    private function __toStringImpl()
    {
        return "[ " . $this->name . "]";
    }
}

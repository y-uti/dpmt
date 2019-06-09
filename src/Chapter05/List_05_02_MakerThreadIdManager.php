<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Mutex;

class List_05_02_MakerThreadIdManager extends \Threaded
{
    private $id;

    public function __construct()
    {
        $this->id = 0;
    }

    public function nextId()
    {
        return $this->synchronized(\Closure::fromCallable([$this, 'nextIdImpl']));
    }

    private function nextIdImpl()
    {
        return $this->id++;
    }
}

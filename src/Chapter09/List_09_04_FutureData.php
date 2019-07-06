<?php
namespace YUti\Dpmt\Chapter09;

class List_09_04_FutureData extends \Volatile implements List_09_03_Data
{
    private $realData;
    private $ready;

    public function __construct()
    {
        $this->realData = new \Volatile();
        $this->ready = false;
    }

    public function setRealData($realData)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'setRealDataImpl']), $realData);
    }

    private function setRealDataImpl($realData)
    {
        if ($this->ready) {
            return;
        }
        $this->realData = $realData;
        $this->ready = true;
        $this->notify();
    }

    public function getContent()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'getContentImpl']));
    }

    private function getContentImpl()
    {
        while (!$this->ready) {
            $this->wait();
        }

        return $this->realData->getContent();
    }
}

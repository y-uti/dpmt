<?php
namespace YUti\Dpmt\Chapter02;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_02_13_Line extends \Threaded
{
    private $start;
    private $end;

    public function __construct(...$args)
    {
        switch (count($args)) {
        case 2:
            $this->constructFromPoints(...$args);
            return;
        case 4:
            $this->constructFromXYPair(...$args);
            return;
        default:
            throw new \InvalidArgumentException();
        }
    }

    private function constructFromXYPair($startX, $startY, $endX, $endY)
    {
        $this->start = new List_02_14_Point($startX, $startY);
        $this->end = new List_02_14_Point($endX, $endY);
    }

    private function constructFromPoints($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getStartX()
    {
        return $this->start->getX();
    }

    public function getStartY()
    {
        return $this->start->getY();
    }

    public function getEndX()
    {
        return $this->end->getX();
    }

    public function getEndY()
    {
        return $this->end->getY();
    }

    public function __toString()
    {
        return "[ Line: {$this->start} - {$this->end} ]";
    }
}

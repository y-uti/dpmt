<?php
namespace YUti\Dpmt\Chapter06;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_06_07_Data extends \Threaded
{
    private $buffer;

    public function __construct($size)
    {
        $this->buffer = array_fill(0, $size, '*');
    }

    public function read()
    {
        return $this->doRead();
    }

    public function write($c)
    {
        $this->doWrite($c);
    }

    private function doRead()
    {
        $newbuf = array_fill(0, count($this->buffer), '');
        for ($i = 0; $i < count($this->buffer); $i++) {
            $newbuf[$i] = $this->buffer[$i];
        }
        $this->slowly();

        return $newbuf;
    }

    private function doWrite($c)
    {
        for ($i = 0; $i < count($this->buffer); $i++) {
            $this->buffer[$i] = $c;
            $this->slowly();
        }
    }

    private function slowly()
    {
        usleep(1000 * 50);
    }
}

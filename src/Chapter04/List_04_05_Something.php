<?php
namespace YUti\Dpmt\Chapter04;

class List_04_05_Something extends \Threaded
{
    private $initialized;

    public function __construct()
    {
        $this->initialized = false;
    }

    public function init($caller)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'initImpl']), $caller);
    }

    private function initImpl($caller)
    {
        if ($this->initialized) {
            return;
        }

        $this->doInit($caller);
        $this->initialized = true;
    }

    private function doInit($caller)
    {
        echo "doInit is executed by $caller\n";
    }
}

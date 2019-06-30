<?php
namespace YUti\Dpmt\Chapter07;

class List_07_a2_HelperThread extends \Thread
{
    private $helper;
    private $count;
    private $c;

    public function __construct($helper, $count, $c)
    {
        $this->helper = $helper;
        $this->count = $count;
        $this->c = $c;
    }

    public function run()
    {
        $this->helper->handle($this->count, $this->c);
    }
}

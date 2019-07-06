<?php
namespace YUti\Dpmt\Chapter08;

class List_08_05_WorkerThread extends \Thread
{
    private $name;
    private $channel;

    public function __construct($name, $channel)
    {
        $this->name = $name;
        $this->channel = $channel;
    }

    public function getName()
    {
        return $this->name;
    }

    public function run()
    {
        while (true) {
            $request = $this->channel->takeRequest();
            $request->execute();
        }
    }
}

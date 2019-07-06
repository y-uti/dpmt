<?php
namespace YUti\Dpmt\Chapter08;

class List_08_02_ClientThread extends \Thread
{
    private $name;
    private $channel;

    public function __construct($name, $channel)
    {
        $this->name = $name;
        $this->channel = $channel;

        new List_08_03_Request(null, 0);
    }

    public function getName()
    {
        return $this->name;
    }

    public function run()
    {
        for ($i = 0; ; $i++) {
            $request = new List_08_03_Request($this->getName(), $i);
            $this->channel->putRequest($request);
            usleep(1000 * rand(1, 1000));
        }
    }
}

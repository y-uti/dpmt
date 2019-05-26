<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_03_04_ServerThread extends \Thread
{
    private $requestQueue;
    private $name;

    public function __construct($requestQueue, $name)
    {
        $this->requestQueue = $requestQueue;
        $this->name = $name;
    }

    public function run()
    {
        for ($i = 0; $i < 10000; $i++) {
            $request = $this->requestQueue->getRequest();
            echo "{$this->name} handles $request\n";
            usleep(1000 * rand(1, 1000));
        }
    }
}

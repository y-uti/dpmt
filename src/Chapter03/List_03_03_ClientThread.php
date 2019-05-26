<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_03_03_ClientThread extends \Thread
{
    private $requestQueue;
    private $name;

    public function __construct($requestQueue, $name)
    {
        $this->requestQueue = $requestQueue;
        $this->name = $name;

        new List_03_01_Request(null);
    }

    public function run()
    {
        for ($i = 0; $i < 10000; $i++) {
            $request = new List_03_01_Request("No. $i");
            echo "{$this->name} requests $request\n";
            $this->requestQueue->putRequest($request);
            usleep(1000 * rand(1, 1000));
        }
    }
}

<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_01_11_UserThread extends \Thread
{
    private $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function run()
    {
        while (true) {
            $this->resource->use();
            usleep(rand(0, 3000) * 1000);
        }
    }
}

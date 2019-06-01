<?php
namespace YUti\Dpmt\Chapter03;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_03_12_TalkThread extends \Thread
{
    private $input;
    private $output;
    private $name;

    public function __construct($input, $output, $name)
    {
        $this->input = $input;
        $this->output = $output;
        $this->name = $name;

        new List_03_01_Request(null);
    }

    public function run()
    {
        echo "{$this->name}: BEGIN\n";

        for ($i = 0; $i < 20; $i++) {
            $request1 = $this->input->getRequest();
            echo "{$this->name} gets $request1\n";

            $request2 = new List_03_01_Request($request1->getName() . '!');
            $this->output->putRequest($request2);
            echo "{$this->name} puts $request2\n";
        }

        echo "{$this->name}: END\n";

        sleep(1);
    }
}

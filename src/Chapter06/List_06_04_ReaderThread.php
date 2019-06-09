<?php
namespace YUti\Dpmt\Chapter06;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_06_04_ReaderThread extends \Thread
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function run()
    {
        while (true) {
            $readbuf = $this->data->read();
            $threadId = $this->getThreadId();
            $readstr = implode('', $readbuf);
            echo "$threadId reads $readstr\n";
        }
    }
}

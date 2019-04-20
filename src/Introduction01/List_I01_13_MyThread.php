<?php
namespace YUti\Dpmt\Introduction01;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_I01_13_MyThread extends \Thread
{
    private $bank;

    public function __construct($bank)
    {
        $this->bank = $bank;
    }

    public function run()
    {
        $threadId = $this->getThreadId();
        while ($this->bank->withdraw(10)) {
            echo "[$threadId] withdraw\n";
        }
    }
}

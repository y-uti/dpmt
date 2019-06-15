<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_Ex08_LazyThread extends \Thread
{
    private $name;
    private $table;

    public function __construct($name, $table)
    {
        $this->name = $name;
        $this->table = $table;
    }

    public function run()
    {
        while (true) {
            $this->table->synchronized(\Closure::fromCallable([$this, 'waitImpl']));
        }
    }

    private function waitImpl()
    {
        $this->table->wait();
        echo "{$this->name} NOTIFIED\n";
    }
}

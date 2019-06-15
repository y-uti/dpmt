<?php
namespace YUti\Dpmt\Chapter05;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_05_Ex06_MakerThread extends \Thread
{
    private $name;
    private $table;
    private $idManager;

    public function __construct($name, $table, $idManager)
    {
        $this->name = $name;
        $this->table = $table;
        $this->idManager = $idManager;
    }

    public function run()
    {
        while (!$this->table->isClosed()) {
            usleep(1000 * rand(1, 1000));
            $cake = "[ Cake No. {$this->nextId()} by {$this->name} ]";
            $this->table->put($cake);
        }

        echo "{$this->name}: done\n";
    }

    private function nextId()
    {
        return $this->idManager->nextId();
    }
}
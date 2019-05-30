<?php
namespace YUti\Dpmt\Chapter04;

require_once __DIR__ . '/../../vendor/autoload.php';

class List_04_01_Data extends \Threaded
{
    private $filename;
    private $content;
    private $changed;

    public function __construct($filename, $content)
    {
        $this->filename = $filename;
        $this->content = $content;
        $this->changed = true;
    }

    public function change($newContent)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'changeImpl']), $newContent);
    }

    private function changeImpl($newContent)
    {
        $this->content = $newContent;
        $this->changed = true;
    }

    public function save()
    {
        $this->synchronized(\Closure::fromCallable([$this, 'saveImpl']));
    }

    private function saveImpl()
    {
        if (!$this->changed) {
            return;
        }

        $this->doSave();
        $this->changed = false;
    }

    private function doSave()
    {
        $threadId = \Thread::getCurrentThreadId();
        echo "$threadId calls doSave, content = {$this->content}\n";
    }
}

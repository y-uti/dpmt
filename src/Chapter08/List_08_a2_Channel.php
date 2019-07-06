<?php
namespace YUti\Dpmt\Chapter08;

class List_08_a2_Channel extends \Threaded
{
    private $threads;
    private $number;

    public function __construct()
    {
        $this->threads = [];
        $this->number = 0;
    }

    public function putRequest($request)
    {
        $this->synchronized(\Closure::fromCallable([$this, 'putRequestImpl']), $request);
    }

    private function putRequestImpl($request)
    {
        $t = new class($request, $this->number) extends \Thread {

            public function __construct($request, $number)
            {
                $this->request = $request;
                $this->number = $number;
            }

            public function getName()
            {
                return "Worker-{$this->number}";
            }

            public function run()
            {
                $this->request->execute();
            }
        };
        $t->start();

        $this->threads[] = $t;
        $this->number++;
    }
}

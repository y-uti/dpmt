<?php
namespace YUti\Dpmt\Chapter01;

require_once __DIR__ . '/../../vendor/autoload.php';

use YUti\Dpmt\Common\Semaphore;

class List_01_11_BoundedResource
{
    private $semaphore;
    private $permits;
    private $logger;

    public function __construct($permits)
    {
        $this->semaphore = new Semaphore($permits);
        $this->permits = $permits;
        $this->logger = new List_01_11_Log();
    }

    public function use()
    {
        $this->semaphore->acquire();
        try {
            $this->doUse();
        } finally {
            $this->semaphore->release();
        }
    }

    protected function doUse()
    {
        $this->logger->info(
            'BEGIN: used = '
            . ($this->permits - $this->semaphore->availablePermits())
        );
        usleep(rand(0, 500) * 1000);
        $this->logger->info(
            'END:   used = '
            . ($this->permits - $this->semaphore->availablePermits())
        );
    }
}

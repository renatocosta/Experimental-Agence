<?php

namespace Backoffice\Consultant\Application\Command\Handler;

use Backoffice\Consultant\Application\Command\ConsultantByPerformanceCalculationsCommand;
use Backoffice\Consultant\Domain\Services\ConsultantByPerformanceService;

class ConsultantByPerformanceCalculationsCommandHandler {

    private $service;
    
    /**
     * 
     * @param ConsultantByPerformanceService $service
     */
    public function __construct(ConsultantByPerformanceService $service)
    { 
       $this->service = $service;
    }
    
    public function handle(ConsultantByPerformanceCalculationsCommand $command)
    {  
       $this->service->setInitial($command->getData());
       $command->setService($this->service);
    }    
    
}

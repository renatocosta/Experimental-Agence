<?php

namespace Backoffice\Client\Application\Command\Handler;

use Backoffice\Client\Application\Command\ClientByPerformanceCalculationsCommand;
use Backoffice\Client\Domain\Services\ClientByPerformanceService;

class ClientByPerformanceCalculationsCommandHandler {

    private $service;
    
    /**
     * 
     * @param ClientByPerformanceService $service
     */
    public function __construct(ClientByPerformanceService $service)
    { 
       $this->service = $service;
    }
    
    public function handle(ClientByPerformanceCalculationsCommand $command)
    {  
       $this->service->setInitial($command->getData());
       
       if($command->getShowPercentage()){
        $this->service->addPercentage();
       }
       
       $command->setService($this->service);
    }    
    
}

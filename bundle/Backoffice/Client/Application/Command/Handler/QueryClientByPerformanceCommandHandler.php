<?php

namespace Backoffice\Client\Application\Command\Handler;

use Backoffice\Client\Domain\Repositories\ClientByPerformanceRepository;
use Backoffice\Client\Application\Command\QueryClientByPerformanceCommand;

class QueryClientByPerformanceCommandHandler {

    private $repository;

    /**
     * 
     * @param ClientByPerformanceRepository $repository
     */
    public function __construct(ClientByPerformanceRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(QueryClientByPerformanceCommand $command)
    {  
       $command->setData($this->repository->getByCriteria($command->getFilter())->toArray());
    }    
    
}

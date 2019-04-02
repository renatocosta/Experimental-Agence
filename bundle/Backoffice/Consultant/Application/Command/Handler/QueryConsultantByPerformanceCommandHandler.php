<?php

namespace Backoffice\Consultant\Application\Command\Handler;

use Backoffice\Consultant\Domain\Repositories\ConsultantByPerformanceRepository;
use Backoffice\Consultant\Application\Command\QueryConsultantByPerformanceCommand;

class QueryConsultantByPerformanceCommandHandler {

    private $repository;

    /**
     * 
     * @param ConsultantByPerformanceRepository $repository
     */
    public function __construct(ConsultantByPerformanceRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(QueryConsultantByPerformanceCommand $command)
    {  
       $command->setData($this->repository->getByCriteria($command->getFilter())->toArray());
    }    
    
}

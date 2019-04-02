<?php

namespace Backoffice\Consultant\Application\Command\Handler;

use Backoffice\Consultant\Domain\Repositories\ConsultantRepository;
use Backoffice\Consultant\Application\Command\QueryConsultantCommand;
use Backoffice\Consultant\Domain\Entity\Consultant;

class QueryConsultantCommandHandler {

    private $repository;

    /**
     * 
     * @param ConsultantRepository $repository
     */
    public function __construct(ConsultantRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(QueryConsultantCommand $command)
    {  
       $command->setData($this->repository->getAll()->toArray());
    }    
    
}

<?php

namespace Backoffice\Client\Application\Command\Handler;

use Backoffice\Client\Domain\Repositories\ClientRepository;
use Backoffice\Client\Application\Command\QueryClientCommand;

class QueryClientCommandHandler {

    private $repository;

    /**
     * 
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(QueryClientCommand $command)
    {  
       $command->setData($this->repository->getAll()->toArray());
    }    
    
}

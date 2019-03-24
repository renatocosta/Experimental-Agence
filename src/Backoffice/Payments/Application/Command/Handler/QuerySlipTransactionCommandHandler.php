<?php

namespace Backoffice\Payments\Application\Command\Handler;

use Backoffice\Payments\Domain\Repositories\SlipDetailsRepository;
use Backoffice\Payments\Application\Command\QuerySlipTransactionCommand;

class QuerySlipTransactionCommandHandler {

    private $repository;

    /**
     * 
     * @param SlipDetailsRepository $repository
     */
    public function __construct(SlipDetailsRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(QuerySlipTransactionCommand $command)
    {  
       $command->setData($this->repository->findByTransactionsId($command->getTransactionId())->toArray());
    }    
    
}

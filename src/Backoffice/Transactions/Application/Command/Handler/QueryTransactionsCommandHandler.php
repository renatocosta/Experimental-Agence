<?php

namespace Backoffice\Transactions\Application\Command\Handler;

use Backoffice\Transactions\Domain\Repositories\TransactionsRepository;
use Backoffice\Transactions\Application\Command\QueryTransactionCommand;

class QueryTransactionsCommandHandler {

    private $repository;

    /**
     * 
     * @param TransactionsRepository $repository
     */
    public function __construct(TransactionsRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(QueryTransactionCommand $command)
    {
        
        $command->setData($this->repository->getAll()->toArray());
        
    }    
    
}

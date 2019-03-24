<?php

namespace Backoffice\Payments\Application\Command\Handler;

use Backoffice\Payments\Domain\Repositories\CardDetailsRepository;
use Backoffice\Payments\Application\Command\QueryCreditCardTransactionCommand;

class QueryCreditCardTransactionCommandHandler {

    private $repository;

    /**
     * 
     * @param CardDetailsRepository $repository
     */
    public function __construct(CardDetailsRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(QueryCreditCardTransactionCommand $command)
    {  
       $command->setData($this->repository->findByTransactionsId($command->getTransactionId())->toArray());
    }    
    
}

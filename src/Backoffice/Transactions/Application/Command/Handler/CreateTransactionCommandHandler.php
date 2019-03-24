<?php

namespace Backoffice\Transactions\Application\Command\Handler;

use Backoffice\Transactions\Domain\Repositories\TransactionsRepository;
use Backoffice\Transactions\Application\Command\CreateTransactionCommand;
use Backoffice\Transactions\Domain\Entity\Transactions;
use Backoffice\Transactions\Domain\ValueObject\TransactionsStatus;

class CreateTransactionCommandHandler {

    private $transactionRepository;

    /**
     * 
     * @param TransactionsRepository $transactionRepository
     */
    public function __construct(TransactionsRepository $transactionRepository)
    { 
       $this->transactionRepository = $transactionRepository;    
    }
    
    public function handle(CreateTransactionCommand $command)
    {

        $transaction = new Transactions(0, $command->getBuyerId(), $command->getWayPaymentId(), TransactionsStatus::CREATED, $command->getAmount());
        $transactionId = $this->transactionRepository->add($transaction->create());
        
        $command->setTransactionId($transactionId); 
        
    }    
    
}

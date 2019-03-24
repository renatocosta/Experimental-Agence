<?php

namespace Backoffice\Payments\Application\Command\Handler;

use Backoffice\Payments\Domain\Repositories\CardDetailsRepository;
use Backoffice\Payments\Application\Command\CreateCreditCardTransactionCommand;
use Backoffice\Payments\Domain\Entity\CreditCard;

class CreateCreditCardTransactionCommandHandler {

    private $repository;

    /**
     * 
     * @param CardDetailsRepository $repository
     */
    public function __construct(CardDetailsRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(CreateCreditCardTransactionCommand $command)
    {  
       $transactionCreditCard = new CreditCard($command->getTransactionId(), $command->getHolderName(), $command->getNumber(), $command->getExpirationDate(), $command->getCvv());
       $this->repository->add($transactionCreditCard->create());
        
    }    
    
}

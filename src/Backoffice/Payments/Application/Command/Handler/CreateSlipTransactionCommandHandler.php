<?php

namespace Backoffice\Payments\Application\Command\Handler;

use Backoffice\Payments\Domain\Repositories\SlipDetailsRepository;
use Backoffice\Payments\Application\Command\CreateSlipTransactionCommand;
use Backoffice\Payments\Domain\Entity\Slip;

class CreateSlipTransactionCommandHandler {

    private $repository;

    /**
     * 
     * @param SlipDetailsRepository $repository
     */
    public function __construct(SlipDetailsRepository $repository)
    { 
       $this->repository = $repository;    
    }
    
    public function handle(CreateSlipTransactionCommand $command)
    {   
       
       $transactionSlip = new Slip($command->getTransactionId());
       $this->repository->add($transactionSlip->create());
       $command->setNumber($this->repository->getNumber());
        
    }    
    
}

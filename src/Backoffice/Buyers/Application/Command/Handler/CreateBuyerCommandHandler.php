<?php

namespace Backoffice\Buyers\Application\Command\Handler;

use Backoffice\Buyers\Domain\Repositories\BuyerRepository;
use Backoffice\Buyers\Application\Command\CreateBuyerCommand;
use Backoffice\Buyers\Domain\Entity\Buyer;

class CreateBuyerCommandHandler {

    private $buyerRepository;

    /**
     * 
     * @param BuyerRepository $buyerRepository
     */
    public function __construct(BuyerRepository $buyerRepository)
    {
       $this->buyerRepository = $buyerRepository;    
    }
    
    public function handle(CreateBuyerCommand $command)
    {
        
        $buyer = new Buyer(0, $command->getName(), $command->getMail(), $command->getCpf(), $command->getClientId());
        $this->buyerRepository->add($buyer->create());
        
    }    
    
}

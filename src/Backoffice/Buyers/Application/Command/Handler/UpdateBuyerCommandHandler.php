<?php

namespace Backoffice\Buyers\Application\Command\Handler;

use Backoffice\Buyers\Domain\Repositories\BuyerRepository;
use Backoffice\Buyers\Application\Command\UpdateBuyerCommand;
use Backoffice\Buyers\Domain\Entity\Buyer;
use Backoffice\Buyers\Domain\ValueObject\BuyerId;

class UpdateBuyerCommandHandler {

    private $buyerRepository;

    /**
     * 
     * @param BuyerRepository $buyerRepository
     */
    public function __construct(BuyerRepository $buyerRepository)
    {
       $this->buyerRepository = $buyerRepository;    
    }
    
    public function handle(UpdateBuyerCommand $command)
    {
        
        $buyer = new Buyer($command->getBuyerId(), $command->getName(), $command->getMail(), $command->getCpf(), 0);
        $this->buyerRepository->save($buyer->change());
        
    }    
    
}

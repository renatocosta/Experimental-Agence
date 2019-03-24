<?php

namespace Backoffice\Buyers\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Buyers\Domain\Repositories\BuyerRepository;
use Backoffice\Buyers\Domain\ValueObject\BuyerId;
use Backoffice\Buyers\Domain\Entity\Buyer;
use Backoffice\Buyers\Infrastructure\Persistence\Orm\Eloquent\EloquentBuyerModel;

class EloquentBuyerRepository implements BuyerRepository {


    public function findByBuyerId(BuyerId $buyerId): Buyer {
        
    }

    public function add(Buyer $buyer) {
        
        $eloquentBuyerModel = new EloquentBuyerModel();
        $eloquentBuyerModel->clientId = $buyer->getClientId();
        
        $eloquentBuyerModel->name = $buyer->getName();
        $eloquentBuyerModel->mail = $buyer->getMail();
        $eloquentBuyerModel->cpf = $buyer->getCpf();        
        
        return $eloquentBuyerModel->save();
        
    }

    public function save(Buyer $buyer) {
        
        $eloquentBuyerModel = EloquentBuyerModel::where('buyerId', $buyer->getBuyerId())
            ->first();
        
        if(!$eloquentBuyerModel) {
           throw new \Shared\Domain\Exception\DomainErrorException('No such buyer with number id: ' . $buyer->getBuyerId());
        }
        
        $atLeastOneFieldFilled = true;
        
        if(!empty($buyer->getName())) {
            $eloquentBuyerModel->name = $buyer->getName();
            $atLeastOneFieldFilled = false;            
        }

        if(!empty($buyer->getMail())) {
            $eloquentBuyerModel->mail = $buyer->getMail();
            $atLeastOneFieldFilled = false;                        
        }
        
        if(!empty($buyer->getCpf())) {
            $eloquentBuyerModel->cpf = $buyer->getCpf();
            $atLeastOneFieldFilled = false;                        
        }
        
        if($atLeastOneFieldFilled) { 
           throw new \Shared\Domain\Exception\DomainErrorException('At least one field must be filled');
        }        
        
        return $eloquentBuyerModel->save();        
        
    }

    public function buyerById(BuyerId $buyerId): Buyer {
        
    }

    public function nextIdentity(): BuyerId {
        
        return new BuyerId();        
        
    }

}

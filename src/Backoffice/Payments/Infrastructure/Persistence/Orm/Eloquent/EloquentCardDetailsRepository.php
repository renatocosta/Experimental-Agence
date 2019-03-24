<?php

namespace Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Payments\Domain\Repositories\CardDetailsRepository;
use Backoffice\Payments\Domain\ValueObject\CreditCardId;
use Backoffice\Payments\Domain\Entity\CreditCard;
use Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent\EloquentCardDetailsModel;

class EloquentCardDetailsRepository implements CardDetailsRepository {

    /**
     *
     * @var EloquentCardDetailsModel 
     */
    private $model;    

    public function __construct(EloquentCardDetailsModel $model) {
        $this->model = $model;
    }
    
    public function add(CreditCard $creditCard) {
        
        $this->model->holder_name = $creditCard->getHolderName();
        $this->model->number = $creditCard->getNumber();
        $this->model->expiration_date = $creditCard->getExpirationDate();
        $this->model->cvv = $creditCard->getCvv();
        $this->model->transactionId = $creditCard->getTransactionId();
        
        return $this->model->save();        
        
    }

    public function findByTransactionsId(int $transactionId) {
        
        return $this->model
                        ->with('transaction:transactionId,amount,status_payment,createdDate')
                        ->with('transaction.buyer:buyerId,name,mail')                
                        ->where('transactionId', $transactionId)
                        ->get();        
        
    }

    public function nextIdentity(): CreditCardId {
        
    }

    public function save(CreditCard $creditCard) {
        
    }

}

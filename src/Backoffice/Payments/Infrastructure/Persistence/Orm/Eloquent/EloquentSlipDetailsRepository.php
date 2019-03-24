<?php

namespace Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Payments\Domain\Repositories\SlipDetailsRepository;
use Backoffice\Payments\Domain\ValueObject\SlipId;
use Backoffice\Payments\Domain\Entity\Slip;
use Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent\EloquentSlipDetailsModel;

class EloquentSlipDetailsRepository implements SlipDetailsRepository {

    /**
     *
     * @var EloquentSlipDetailsModel 
     */
    private $model;    

    public function __construct(EloquentSlipDetailsModel $model) {
        $this->model = $model;
    }
    
    public function add(Slip $slip) {
        
        $this->model->number = '';
        $this->model->transactionId = $slip->getTransactionId();
        
        $this->model->save();        
        
        return $this->model;
        
    }

    public function findByTransactionsId(int $transactionId) {

        return $this->model
                        ->with('transaction:transactionId,amount,status_payment,createdDate')
                        ->with('transaction.buyer:buyerId,name,mail')                
                        ->where('transactionId', $transactionId)
                        ->get();    
        
    }

    public function nextIdentity(): Slip {
        
    }

    public function save(Slip $slip) {
        
    }

    public function getNumber() {
       return $this->model->number; 
    }

}

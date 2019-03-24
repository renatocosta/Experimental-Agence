<?php

namespace Backoffice\Payments\Domain\Entity;

use Shared\Domain\ValueObject\AggregateRoot;
use Backoffice\Transactions\Domain\Events\TransactionsWasCreated;

class Slip extends AggregateRoot
{
    
    /**
     * @var string
     */    
    private $number; 
    
    /*
     * @var int
     */
    private $transactionId;
    
    public static $createRules = [
        ];

    public static $updateRules = [
    ];
    
    public function __construct(
           $transactionId
        ) {
        $this->setTransactionId($transactionId);
    }
    
    public function create(): Slip {
        
        $this->raise(
            new TransactionsWasCreated('transaction-event-slip-created', $this->getTransactionId())
        );
        
        return $this;
    }
    
    public function setTransactionId($transactionId){
        $this->transactionId = $transactionId;
    }
    
    public function getTransactionId(): int
    {
        return $this->transactionId;
    }    
    
}
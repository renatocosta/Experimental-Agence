<?php

namespace Backoffice\Payments\Application\Command;

class CreateSlipTransactionCommand {
    
    /** @var int */
    private $transactionId;
    
    /* @var int */
    private $number;
    
    public function __construct($transactionId){
        $this->transactionId = $transactionId;
    }
    
    public function getTransactionId(): int {
       return $this->transactionId; 
    }

    public function getNumber(): string {
       return $this->number; 
    }

    public function setNumber(string $number) {
        $this->number = $number;
    }    
    
}
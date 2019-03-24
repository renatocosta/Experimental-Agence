<?php

namespace Backoffice\Payments\Application\Command;

class QuerySlipTransactionCommand {
    
    /** @var int */
    private $transactionId;

    /** @var array */
    private $data;
    
    public function __construct($transactionId)
    { 
        $this->transactionId = $transactionId;
    }
        
    public function getTransactionId(): int {
       return $this->transactionId; 
    }
    
    public function setData(array $data) {
      $this->data = $data;  
    }
    
    public function getData(): array {
        return $this->data;
    }    

}
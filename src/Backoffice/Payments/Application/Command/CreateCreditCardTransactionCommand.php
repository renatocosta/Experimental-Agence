<?php

namespace Backoffice\Payments\Application\Command;

class CreateCreditCardTransactionCommand {
    
    /** @var int */
    private $transactionId;
    
    /** @var string */
    private $holderName;
    
    /** @var string */
    private $number;

    /** @var string */
    private $expiration_date;
    
    /** @var string */
    private $cvv;    
    
    
    public function __construct($transactionId, $holderName, $number, $expiration_date, $cvv)
    { 
        $this->transactionId = $transactionId;
        $this->holderName = $holderName;
        $this->number = $number;
        $this->expiration_date = $expiration_date;
        $this->cvv = $cvv;
    }
        
    /**
     * @return string
     */
    public function getHolderName(): string
    {
        return $this->holderName;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }    
    
    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expiration_date;
    }
    
    /**
     * @return string
     */
    public function getCvv(): string
    {
        return $this->cvv;
    }

    public function getTransactionId(): int {
       return $this->transactionId; 
    }

}
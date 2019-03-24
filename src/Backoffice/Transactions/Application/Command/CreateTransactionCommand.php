<?php

namespace Backoffice\Transactions\Application\Command;

class CreateTransactionCommand {
    
    /** @var int */
    private $buyerId;
    
    /** @var int */
    private $wayPaymentId;
    
    /** @var int */
    private $amount;
    
    /*  @var int */
    private $transactionId;
    
    /**
     * 
     * @param type $buyerId
     * @param type $wayPaymentId
     * @param type $amount
     */
    public function __construct($buyerId, $wayPaymentId, $amount)
    {
        $this->buyerId = $buyerId;
        $this->wayPaymentId = $wayPaymentId;
        $this->amount = $amount;
    }
    
    /**
     * @return int
     */
    public function getBuyerId(): int
    {
        return $this->buyerId;
    }
    
    /**
     * @return int
     */
    public function getWayPaymentId(): int
    {
        return $this->wayPaymentId;
    }
    
    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getTransactionId(): int {
       return $this->transactionId; 
    }

    public function setTransactionId(int $id) {
     $this->transactionId = $id;    
    }

}
<?php

namespace Backoffice\Payments\Domain\Entity;

use Shared\Domain\ValueObject\AggregateRoot;
use Backoffice\Transactions\Domain\Events\TransactionsWasCreated;

class CreditCard extends AggregateRoot
{
    
    /**
     * @var int
     */    
    private $transactionId;
    
    /**
     * @var string
     */    
    private $holderName;    
    
    /**
     * @var string
     */    
    private $number;    
    
    /**
     * @var string
     */    
    private $expiration_date;        

    /**
     * @var string
     */    
    private $cvv;            
    
    public static $createRules = [
        //'transactionid' => 'required|exists:transactions,transactionId',
        'creditcard_details.holder_name' => 'required', 
        'creditcard_details.number' => 'required', 
        'creditcard_details.expiration_date' => 'required',
        'creditcard_details.cvv' => 'required'      
    ];

    public static $updateRules = [
    ];
    
    public function __construct(
           $transactionId,
           $holderName,
           $number,
           $expirationDate,
           $cvv
        ) {
        
        $this->setTransactionId($transactionId);
        $this->setHolderName($holderName);
        $this->setNumber($number);
        $this->setExpirationDate($expirationDate);
        $this->setCvv($cvv);
    }
    
    public function create(): CreditCard {
        
        $this->raise(
            new TransactionsWasCreated('transaction-event-creditcard-created', $this->getNumber())
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

    public function setHolderName($holderName){
        $this->holderName = $holderName;
    }
    
    public function getHolderName(): string
    {
        return $this->holderName;
    }      

    public function setNumber($number){
        $this->number = $number;
    }
    
    public function getNumber(): string
    {
        return $this->number;
    }      
    
    public function setExpirationDate($expirationDate){
        $this->expiration_date = $expirationDate;
    }
    
    public function getExpirationDate(): string
    {
        return $this->expiration_date;
    }          
 
    public function setCvv($cvv){
        $this->cvv = $cvv;
    }
    
    public function getCvv(): string
    {
        return $this->cvv;
    }      
    
}
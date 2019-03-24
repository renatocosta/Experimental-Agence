<?php

namespace Backoffice\Transactions\Domain\Entity;

use Shared\Domain\ValueObject\AggregateRoot;
use Backoffice\Transactions\Domain\Events\TransactionsWasCreated;
use Backoffice\Transactions\Domain\ValueObject\TransactionsId;

class Transactions extends AggregateRoot
{
    protected $uuid;
    
    /**
     * @var int
     */    
    private $transactionId;
    
    /**
     * @var int
     */    
    private $buyerId;

    /**
     * @var int
     */    
    private $wayPaymentId;
    
    /**
     * @var string
     */    
    private $status_payment;
    
    /**
     * @var int
     */    
    private $amount;
    
    /**
     * @var \DateTime
     */
    private $createdAt;
    /**
     * @var null|\DateTime
     */
    private $updatedAt;
    
    public static $createRules = [
        'buyerid' => 'required|exists:buyers,buyerId',
        'waypaymentid' => 'required|exists:way_payments,wayPaymentId',
        'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
    ];

    public static $updateRules = [
        'buyerid' => 'required|exists:buyers,buyerId',  
        'waypaymentid' => 'exists:way_payments,wayPaymentId',        
        'transactionid' => '',
        'amount' => ''      
    ];
    
    public function __construct(
        //TransactionId $transactionId,   
        $transactionId,               
        int $buyerId,
        int $wayPaymentId,
        string $status_payment,
        $amount    
        ) {
        parent::__construct(new TransactionsId());        
        //parent::__construct($buyerId);
        $this->setBuyerId($buyerId);
        $this->setWayPaymentId($wayPaymentId);
        $this->setStatusPayment($status_payment);
        $this->setAmount($amount);
        $this->createdAt = new \DateTime();
    }
    
    public function create(): Transactions {
        
        $this->raise(
            new TransactionsWasCreated('transaction-event-created', $this->getBuyerId())
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
    
    public function getId(): TransactionsId {
      return $this->uuid;  
    }
    
    public function setBuyerId(int $buyerId){
        $this->buyerId = $buyerId;
    }
    
    public function getBuyerId(): int
    {
        return $this->buyerId;
    }    
    
    public function setWayPaymentId(int $wayPaymentId){
        $this->wayPaymentId = $wayPaymentId;
    }
    
    public function getWayPaymentId(): int
    {
        return $this->wayPaymentId;
    } 
    
    public function setStatusPayment(string $statusPayment){
        $this->status_payment = $statusPayment;
    }
    
    public function getStatusPayment(): string
    {
        return $this->status_payment;
    }       
    
    public function setAmount(int $amount){
        $this->amount = $amount;
    }
    
    public function getAmount(): int
    {
        return $this->amount;
    }        
    
    public function createdAt(): \DateTime
    {
        return $this->createdAt;
    }
    
    public function updatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
    
}
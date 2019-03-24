<?php

namespace Backoffice\Buyers\Domain\Entity;

use Shared\Domain\ValueObject\AggregateRoot;
use Backoffice\Buyers\Domain\Events\BuyerWasCreated;
use Backoffice\Buyers\Domain\Events\BuyerWasChanged;
use Backoffice\Buyers\Domain\ValueObject\BuyerId;

class Buyer extends AggregateRoot
{
    /**
     * @var BuyerId
     */
    protected $uuid;
    
    private $buyerId;
    
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $mail;
    
    /**
     * @var string
     */
    private $cpf;
    
    /**
     * @var int
     */
    private $clientId;    
    
    
    /**
     * @var \DateTime
     */
    private $createdAt;
    /**
     * @var null|\DateTime
     */
    private $updatedAt;
    
    public static $createRules = [
        'clientid' => 'required',
        'name' => 'required',
        'mail' => 'required|email',
        'cpf' => 'required'
    ];

    public static $updateRules = [
        'buyerid' => '',        
        'name' => '',
        'mail' => 'email',
        'cpf' => ''
    ];
    
    public function __construct(
        //BuyerId $buyerId,   
        $buyerId,               
        string $name,
        string $mail,
        string $cpf,
        int $clientId    
        ) {
        parent::__construct(new BuyerId());        
        //parent::__construct($buyerId);
        $this->setName($name);
        $this->setMail($mail);
        $this->setCpf($cpf);
        $this->setClientId($clientId);
        $this->setBuyerId($buyerId);
        $this->createdAt = new \DateTime();
    }
    
    public function create(): Buyer {
        
        $this->raise(
            new BuyerWasCreated('test-event-created', $this->getName())
        );
        
        return $this;
    }
    
    public function change(): Buyer
    {
        
        $this->raise(
            new BuyerWasChanged('test-event-changed', $this->getName())
        );
        
        return $this;
    }

    public function setBuyerId($buyerId){
        $this->buyerId = $buyerId;
    }
    
    public function getBuyerId(): int
    {
        return $this->buyerId;
    }
    
    public function getId(): BuyerId {
      return $this->uuid;  
    }
    
    public function setName(string $name){
        $this->name = $name;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function setMail(string $mail){
        $this->mail = $mail;
    }
    
    public function getMail(): string
    {
        return $this->mail;
    }    
    
    public function setCpf(string $cpf){
        $this->cpf = $cpf;
    }
    
    public function getCpf(): string
    {
        return $this->cpf;
    }    
    
    public function setClientId(int $clientId){
        $this->clientId = $clientId;
    }
    
    public function getClientId(): int
    {
        return $this->clientId;
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
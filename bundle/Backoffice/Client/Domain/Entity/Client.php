<?php

namespace Backoffice\Client\Domain\Entity;

use Shared\Domain\ValueObject\AggregateRoot;
use Backoffice\Client\Domain\Events\ClientWasCreated;

class Client extends AggregateRoot
{
    
    /**
     * @var int
     */    
    private $ClientId;
    
    /**
     * @var string
     */    
    private $no_email;    
    
    /**
     * @var string
     */    
    private $no_usuario;    
    
    public function __construct(
           $ClientId,
           $no_email,
           $no_usuario
        ) {
        
        $this->setClientId($ClientId);
        $this->setNoUsuario($no_usuario);
        $this->setNoEmail($no_email);
    }
    
    public function create(): Client {
        
        $this->raise(
            new ClientWasCreated('Client-event-created', $this->getClientId())
        );
        
        return $this;
    }
    
    public function setClientId($ClientId){
        $this->ClientId = $ClientId;
    }
    
    public function getClientId(): int
    {
        return $this->ClientId;
    }    

    public function setNoUsuario($noUsuario){
        $this->no_usuario = $noUsuario;
    }
    
    public function getNoUsuario(): string
    {
        return $this->no_usuario;
    }      

    public function setNoEmail($noEmail){
        $this->no_email = $noEmail;
    }
    
    public function getNoEmail(): string
    {
        return $this->no_email;
    }      
    
}
<?php

namespace Backoffice\Consultant\Domain\Entity;

use Shared\Domain\ValueObject\AggregateRoot;
use Backoffice\Consultant\Domain\Events\ConsultantWasCreated;

class Consultant extends AggregateRoot
{
    
    /**
     * @var int
     */    
    private $consultantId;
    
    /**
     * @var string
     */    
    private $no_email;    
    
    /**
     * @var string
     */    
    private $no_usuario;    
    
    public function __construct(
           $consultantId,
           $no_email,
           $no_usuario
        ) {
        
        $this->setConsultantId($consultantId);
        $this->setNoUsuario($no_usuario);
        $this->setNoEmail($no_email);
    }
    
    public function create(): Consultant {
        
        $this->raise(
            new ConsultantWasCreated('consultant-event-created', $this->getConsultantId())
        );
        
        return $this;
    }
    
    public function setConsultantId($consultantId){
        $this->consultantId = $consultantId;
    }
    
    public function getConsultantId(): int
    {
        return $this->consultantId;
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
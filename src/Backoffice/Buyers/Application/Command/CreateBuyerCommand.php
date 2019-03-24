<?php

namespace Backoffice\Buyers\Application\Command;

class CreateBuyerCommand {
    
    /** @var int */
    private $clientId;
    
    /** @var string */
    private $name;
    
    /** @var string */
    private $mail;

    /** @var string */
    private $cpf;
    
    /**
     * 
     * @param int $clientId
     * @param string $name
     * @param string $mail
     * @param string $cpf
     */
    public function __construct($clientId, $name, $mail, $cpf)
    {
        $this->clientId = $clientId;
        $this->name = $name;
        $this->mail = $mail;
        $this->cpf = $cpf;
    }
    
    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }    
    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }    
}
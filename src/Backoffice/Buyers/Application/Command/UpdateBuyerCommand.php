<?php

namespace Backoffice\Buyers\Application\Command;

class UpdateBuyerCommand {
 
    /** @var int */
    private $buyerId;
    
    /** @var string */
    private $name;
    
    /** @var string */
    private $mail;

    /** @var string */
    private $cpf;
    
    /**
     * 
     * @param int $buyerId
     * @param string $name
     * @param string $mail
     * @param string $cpf
     */
    public function __construct($buyerId, $name, $mail, $cpf)
    {
        $this->buyerId = $buyerId;
        $this->name = $name;
        $this->mail = $mail;
        $this->cpf = $cpf;
    }
    /**
     * @return int
     */
    public function getBuyerId(): int
    {
        return $this->buyerId;
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
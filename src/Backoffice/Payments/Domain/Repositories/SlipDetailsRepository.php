<?php

namespace Backoffice\Payments\Domain\Repositories;

use Backoffice\Payments\Domain\Entity\Slip;

interface SlipDetailsRepository
{
    /**
     * @return Slip
     */
    public function nextIdentity();
    /**
     * @param Slip $slip
     */
    public function add(Slip $slip);
    /**
     * @param Slip $slip
     */
    public function save(Slip $slip);
 
    /**
     * @param int $slipId
     * @return Slip
     */
    public function findByTransactionsId(int $transactionId);
    
    /**
     * @return mixed
     */
    public function getNumber();
}
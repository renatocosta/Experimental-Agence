<?php

namespace Backoffice\Buyers\Domain\Repositories;

use Backoffice\Buyers\Domain\Entity\Buyer;
use Backoffice\Buyers\Domain\ValueObject\BuyerId;

interface BuyerRepository
{
    /**
     * @return BuyerId
     */
    public function nextIdentity();
    /**
     * @param Buyer $buyer
     */
    public function add(Buyer $buyer);
    /**
     * @param Buyer $buyer
     */
    public function save(Buyer $buyer);

    /**
     * @param BuyerId $buyerId
     * @return Buyer
     */
    public function buyerById(BuyerId $buyerId);
    /**
     * @param BuyerId $buyerId
     * @return Buyer
     */
    public function findByBuyerId(BuyerId $buyerId);
}
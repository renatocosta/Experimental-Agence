<?php

namespace Backoffice\Payments\Domain\Repositories;

use Backoffice\Payments\Domain\Entity\CreditCard;
use Backoffice\Payments\Domain\ValueObject\CreditCardId;

interface CardDetailsRepository
{
    /**
     * @return CreditCardId
     */
    public function nextIdentity();
    /**
     * @param CreditCard $creditCard
     */
    public function add(CreditCard $creditCard);
    /**
     * @param CreditCard $creditCard
     */
    public function save(CreditCard $creditCard);

    /**
     * @param int $creditCardId
     * @return Transactions
     */
    public function findByTransactionsId(int $transactionId);
}
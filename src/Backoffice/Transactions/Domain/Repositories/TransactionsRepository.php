<?php

namespace Backoffice\Transactions\Domain\Repositories;

use Backoffice\Transactions\Domain\Entity\Transactions;
use Backoffice\Transactions\Domain\ValueObject\TransactionsId;
use Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent\EloquentTransactionsModel;

interface TransactionsRepository
{
    /**
     * @return TransactionsId
     */
    public function nextIdentity();
    /**
     * @param Transactions $transactions
     */
    public function add(Transactions $transactions);
    /**
     * @param Transactions $transactions
     */
    public function save(Transactions $transactionns);

    /**
     * @param TransactionsId $transactionId
     * @return Transactions
     */
    public function transactionsById(int $transactionId);
    
    /**
     * @return EloquentTransactionsModel
     */
    public function getAll();
    
}
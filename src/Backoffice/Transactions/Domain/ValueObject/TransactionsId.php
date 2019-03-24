<?php

namespace Backoffice\Transactions\Domain\ValueObject;

use Shared\Domain\ValueObject\AggregateRootId;

class TransactionsId extends AggregateRootId {

    /** @var  string */
    protected $uuid;

}
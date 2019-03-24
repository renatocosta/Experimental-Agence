<?php

namespace Backoffice\Payments\Domain\ValueObject;

use Shared\Domain\ValueObject\AggregateRootId;

class CreditCardId extends AggregateRootId {

    /** @var  string */
    protected $uuid;

}
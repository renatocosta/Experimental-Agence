<?php

namespace Backoffice\Buyers\Domain\ValueObject;

use Shared\Domain\ValueObject\AggregateRootId;

class BuyerId extends AggregateRootId {

    /** @var  string */
    protected $uuid;

}
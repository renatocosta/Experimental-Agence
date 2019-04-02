<?php

namespace Backoffice\Client\Domain\ValueObject;

use Shared\Domain\ValueObject\AggregateRootId;

class ClientId extends AggregateRootId {

    /** @var  string */
    protected $uuid;

}
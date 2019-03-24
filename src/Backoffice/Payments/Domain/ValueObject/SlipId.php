<?php

namespace Backoffice\Payments\Domain\ValueObject;

use Shared\Domain\ValueObject\AggregateRootId;

class SlipId extends AggregateRootId {

    /** @var  string */
    protected $uuid;

}
<?php

namespace Backoffice\Consultant\Domain\ValueObject;

use Shared\Domain\ValueObject\AggregateRootId;

class ConsultantId extends AggregateRootId {

    /** @var  string */
    protected $uuid;

}
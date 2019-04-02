<?php

namespace Backoffice\UserPermissions\Domain\ValueObject;

use Shared\Domain\ValueObject\AggregateRoot;

class UserTypes extends AggregateRoot
{
    
    const TYPES = [0, 1, 2];
    
}
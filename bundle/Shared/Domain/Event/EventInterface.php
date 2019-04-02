<?php

namespace Shared\Domain\Event;

interface EventInterface
{
    
    public function uuid();
    
    public function type();
    
    public function createdAt(): \DateTimeImmutable;
    
}
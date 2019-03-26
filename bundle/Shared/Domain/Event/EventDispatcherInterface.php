<?php

namespace Shared\Domain\Event;

interface EventDispatcherInterface
{
    
    public function record(EventInterface $event): void;
    
    public function dispatch(): void;
    
}
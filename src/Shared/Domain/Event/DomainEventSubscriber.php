<?php

namespace Shared\Domain\Event;

use Shared\Domain\Event\AbstractEvent;

interface DomainEventSubscriber
{
    /**
     * @param DomainEvent $aDomainEvent
     */
    public function handle(AbstractEvent $aDomainEvent);
    /**
     * @param DomainEvent $aDomainEvent
     * @return bool
     */
    public function isSubscribedTo(AbstractEvent $aDomainEvent);
}
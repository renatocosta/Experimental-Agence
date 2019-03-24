<?php

namespace Shared\Domain\ValueObject;

use Shared\Domain\Event\EventInterface;
use Shared\Domain\Event\DomainEventPublisher;
use Shared\Domain\ValueObject\AggregateRootId;

abstract class AggregateRoot
{
    
    /**
     * @var AggregateRootId
     */
    protected $uuid;    
    
    protected function __construct(AggregateRootId $aggregateRootId)
    {
        $this->uuid = $aggregateRootId;
    }
    
    public function uuid(): AggregateRootId
    {
        return $this->uuid;
    }
    
    final public function equals(AggregateRootId $aggregateRootId)
    {
        return $this->uuid->equals($aggregateRootId);
    }
        
    final protected function raise(EventInterface $event)
    {
        DomainEventPublisher::instance()->publish($event);
    }
    
    public function __toString(): string
    {
        return (string) $this->uuid;
    }
    
}
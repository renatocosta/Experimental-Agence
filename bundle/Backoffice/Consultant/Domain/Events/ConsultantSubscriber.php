<?php

namespace Backoffice\Consultant\Domain\Events;

use Shared\Domain\Event\DomainEventSubscriber;
use Shared\Domain\Event\AbstractEvent;

class ConsultantSubscriber implements DomainEventSubscriber
{
    
    public $domainEvent;
    
    public $isHandled = false;
    
    private $eventName;
    
    public function __construct($eventName)
    {
        $this->eventName = $eventName;
    }
    
    public function isSubscribedTo(AbstractEvent $aDomainEvent)
    {
        return $this->eventName === $aDomainEvent->eventName;
    }
    
    public function handle(AbstractEvent $aDomainEvent)
    {   
        $this->domainEvent = $aDomainEvent;
        $this->isHandled = true;
        //Do something here
        //echo "Handling just now " . $aDomainEvent->type();exit;
        //exit;
    }
    
}
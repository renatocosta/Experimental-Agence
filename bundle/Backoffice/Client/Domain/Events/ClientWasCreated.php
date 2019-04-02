<?php

namespace Backoffice\Client\Domain\Events;

use Shared\Domain\Event\AbstractEvent;

class ClientWasCreated extends AbstractEvent
{
    /**
     * @var string
     */
    private $ClientId;
    /**
     * @var string
     */
    public $eventName;
    
    public function __construct($eventName, $ClientId)
    {
        parent::__construct();
        $this->eventName = $eventName;
    }
    
    public function occurredOn() {}

    
}
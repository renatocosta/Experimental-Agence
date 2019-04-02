<?php

namespace Backoffice\Consultant\Domain\Events;

use Shared\Domain\Event\AbstractEvent;

class ConsultantWasCreated extends AbstractEvent
{
    /**
     * @var string
     */
    private $consultantId;
    /**
     * @var string
     */
    public $eventName;
    
    public function __construct($eventName, $consultantId)
    {
        parent::__construct();
        $this->eventName = $eventName;
    }
    
    public function occurredOn() {}

    
}
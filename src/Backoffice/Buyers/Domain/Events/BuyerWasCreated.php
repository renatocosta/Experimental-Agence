<?php

namespace Backoffice\Buyers\Domain\Events;

use Shared\Domain\Event\AbstractEvent;
use Backoffice\Buyers\Domain\ValueObject\BuyerId;

class BuyerWasCreated extends AbstractEvent
{
    /**
     * @var string
     */
    private $buyerId;
    /**
     * @var string
     */
    public $eventName;
    
    public function __construct($eventName, $buyername)
    {
        parent::__construct();
        $this->eventName = $eventName;
    }
    
    public function occurredOn() {}

    
}
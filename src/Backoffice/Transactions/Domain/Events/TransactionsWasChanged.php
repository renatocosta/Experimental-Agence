<?php

namespace Backoffice\Transactions\Domain\Events;

use Shared\Domain\Event\AbstractEvent;

class TransactionsWasChanged extends AbstractEvent
{
    /**
     * @var string
     */
    private $transactionId;
    /**
     * @var string
     */
    public $eventName;
    
    public function __construct($eventName, $transactionId)
    {
        parent::__construct();
        $this->eventName = $eventName;
    }
    
    public function occurredOn() {}

    
}
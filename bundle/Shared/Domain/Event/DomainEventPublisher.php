<?php

namespace Shared\Domain\Event;

use Shared\Domain\Event\EventDispatcherInterface;
use Shared\Domain\Event\EventInterface;
use Shared\Domain\Event\AbstractEvent;
use Shared\Domain\Event\DomainEventSubscriber;

class DomainEventPublisher {

    /**
     * @var DomainEventSubscriber[]
     */
    private $subscribers;

    /**
     * @var DomainEventPublisher
     */
    private static $instance = null;
    private $id = 0;

    public static function instance(): self {
        if (null === static::$instance) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    private function __construct() {
        $this->subscribers = [];
    }

    public function __clone() {
        throw new \BadMethodCallException('Clone is not supported');
    }

    public function subscribe(DomainEventSubscriber $aDomainEventSubscriber) {
        $id = $this->id;
        $this->subscribers[$id] = $aDomainEventSubscriber;
        $this->id++;
        return $id;
    }

    public function ofId($id) {
        return isset($this->subscribers[$id]) ? $this->subscribers[$id] : null;
    }

    public function unsubscribe($id) {
        unset($this->subscribers[$id]);
    }

    public function publish(AbstractEvent $aDomainEvent) {
        foreach ($this->subscribers as $aSubscriber) { 
            if ($aSubscriber->isSubscribedTo($aDomainEvent)) {
                $aSubscriber->handle($aDomainEvent);
            }
        }
    }

}

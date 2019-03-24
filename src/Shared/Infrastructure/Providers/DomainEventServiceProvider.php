<?php

namespace Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Shared\Application\CommandBus;
use Shared\Application\SimpleCommandBus;

class DomainEventServiceProvider extends ServiceProvider
{
    private function mappings(): array
    {
        return [
            // Buyer
            ['class' => \Backoffice\Buyers\Domain\Events\BuyerSubscriber::class, 'eventName' => 'test-event-created'],
            ['class' => \Backoffice\Buyers\Domain\Events\BuyerSubscriber::class, 'eventName' => 'test-event-changed'],
           
            // Transactions
            ['class' => \Backoffice\Transactions\Domain\Events\TransactionsSubscriber::class, 'eventName' => 'transaction-event-created'],
            ['class' => \Backoffice\Transactions\Domain\Events\TransactionsSubscriber::class, 'eventName' => 'transaction-event-changed'],
            ['class' => \Backoffice\Transactions\Domain\Events\TransactionsSubscriber::class, 'eventName' => 'transaction-event-creditcard-created'],            
            ['class' => \Backoffice\Transactions\Domain\Events\TransactionsSubscriber::class, 'eventName' => 'transaction-event-slip-created']            
        ];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        foreach ($this->mappings() as $subscriberInfo) {
            
            $subscriber = $this->app->make($subscriberInfo['class'], ['eventName' => $subscriberInfo['eventName']]);
            \Shared\Domain\Event\DomainEventPublisher::instance()->subscribe($subscriber);            

        }
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
    
}
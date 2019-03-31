<?php

namespace Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class DomainEventServiceProvider extends ServiceProvider
{
    private function mappings(): array
    {
        return [
           
            // Consultant
            ['class' => \Backoffice\Consultant\Domain\Events\ConsultantSubscriber::class, 'eventName' => 'consultant-event-created'],
            
            //Clients
            ['class' => \Backoffice\Client\Domain\Events\ClientSubscriber::class, 'eventName' => 'consultant-event-created'],
            
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
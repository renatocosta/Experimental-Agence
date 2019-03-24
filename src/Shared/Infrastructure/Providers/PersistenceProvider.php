<?php

namespace Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Backoffice\Buyers\Domain\Repositories\BuyerRepository;
use Backoffice\Transactions\Domain\Repositories\TransactionsRepository;
use Backoffice\Payments\Domain\Repositories\CardDetailsRepository;
use Backoffice\Payments\Domain\Repositories\SlipDetailsRepository;

class PersistenceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Backoffice\Buyers\Domain\Repositories\BuyerRepository',
            'Backoffice\Buyers\Infrastructure\Persistence\Orm\Eloquent\EloquentBuyerRepository'
        );
        
        $this->app->bind(
            'Backoffice\Transactions\Domain\Repositories\TransactionsRepository',
            'Backoffice\Transactions\Infrastructure\Persistence\Orm\Eloquent\EloquentTransactionsRepository'
        );

        $this->app->bind(
            'Backoffice\Payments\Domain\Repositories\CardDetailsRepository',
            'Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent\EloquentCardDetailsRepository'
        );

        $this->app->bind(
            'Backoffice\Payments\Domain\Repositories\SlipDetailsRepository',
            'Backoffice\Payments\Infrastructure\Persistence\Orm\Eloquent\EloquentSlipDetailsRepository'
        );
        
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            BuyerRepository::class,
            TransactionsRepository::class,
            CardDetailsRepository::class,
            SlipDetailsRepository::class
        ];
    }
}
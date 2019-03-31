<?php

namespace Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Backoffice\Consultant\Domain\Repositories\ConsultantRepository;
use Backoffice\Consultant\Domain\Repositories\ConsultantByPerformanceRepository;
use Backoffice\Client\Domain\Repositories\ClientRepository;
use Backoffice\Client\Domain\Repositories\ClientByPerformanceRepository;

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
            'Backoffice\Consultant\Domain\Repositories\ConsultantRepository',
            'Backoffice\Consultant\Infrastructure\Persistence\Orm\Eloquent\EloquentConsultantRepository'
        );
        $this->app->bind(
            'Backoffice\Consultant\Domain\Repositories\ConsultantByPerformanceRepository',
            'Backoffice\Consultant\Infrastructure\Persistence\Orm\Eloquent\EloquentConsultantByPerformanceRepository'
        );
        $this->app->bind(
            'Backoffice\Client\Domain\Repositories\ClientRepository',
            'Backoffice\Client\Infrastructure\Persistence\Orm\Eloquent\EloquentClientRepository'
        );
        $this->app->bind(
            'Backoffice\Client\Domain\Repositories\ClientByPerformanceRepository',
            'Backoffice\Client\Infrastructure\Persistence\Orm\Eloquent\EloquentClientByPerformanceRepository'
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
            ConsultantRepository::class,
            ConsultantByPerformanceRepository::class,            
            ClientRepository::class,
            ClientByPerformanceRepository::class,              
        ];
    }
}
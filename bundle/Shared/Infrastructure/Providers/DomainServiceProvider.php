<?php

namespace Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Backoffice\Consultant\Domain\Services\ConsultantByPerformanceServiceContract;
use Backoffice\Client\Domain\Services\ClientByPerformanceServiceContract;

class DomainServiceProvider extends ServiceProvider
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
            'Backoffice\Consultant\Domain\Services\ConsultantByPerformanceServiceContract',
            'Backoffice\Consultant\Domain\Services\ConsultantByPerformanceService'
        );
        $this->app->bind(
            'Backoffice\Client\Domain\Services\ClientByPerformanceServiceContract',
            'Backoffice\Client\Domain\Services\ClientByPerformanceService'
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
            ConsultantByPerformanceServiceContract::class,
            ClientByPerformanceServiceContract::class                   
        ];
    }
}
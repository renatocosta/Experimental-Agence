<?php

namespace Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Backoffice\Consultant\Domain\Services\ConsultantByPerformanceServiceContract;

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
        
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            ConsultantByPerformanceServiceContract::class           
        ];
    }
}
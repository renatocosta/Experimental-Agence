<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Google\Cloud\Logging\LoggingClient;

class GCloudLoggingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('gcloudlogging', function () {
          return LoggingClient::psrBatchLogger('app');
        });
    }
}

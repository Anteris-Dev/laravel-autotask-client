<?php

namespace Anteris\Autotask\Laravel;

use Anteris\Autotask\Client;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Actually registers the service with Laravel.
     */
    public function register()
    {
        // Merge in any customizations to the config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/autotask.php', 'autotask'
        );

        // Now setup the Autotask client
        $this->app->singleton(Client::class, function ($app) {
            return new Client(
                $app['config']['autotask.username'],
                $app['config']['autotask.secret'],
                $app['config']['autotask.integration_code'],
                $app['config']['autotask.zone_url']
            );
        });
    }

    /**
     * Boostraps the configuration files, etc. needed by this service.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/autotask.php' => config_path('autotask.php'),
        ]);
    }

    /**
     * Lets Laravel know what services we provide.
     */
    public function provides()
    {
        return [Client::class];
    }
}

<?php

namespace Faithgen\Miscellaneous;

use Illuminate\Support\ServiceProvider;

class MiscellaneousServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('miscellaneous.php'),
            ], 'misc-config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'miscellaneous');

        // Register the main class to use with the facade
        $this->app->singleton('miscellaneous', function () {
            return new Miscellaneous;
        });
    }
}

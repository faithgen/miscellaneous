<?php

namespace Faithgen\Miscellaneous;

use Faithgen\Miscellaneous\Models\Subscription;
use Faithgen\Miscellaneous\Observers\SubscriptionObserver;
use Faithgen\Miscellaneous\Services\ContactService;
use Faithgen\Miscellaneous\Services\SubscriptionService;
use FaithGen\SDK\Traits\ConfigTrait;
use Illuminate\Support\ServiceProvider;

class MiscellaneousServiceProvider extends ServiceProvider
{
    use ConfigTrait;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->registerRoutes(__DIR__.'/../routes/miscellaneous.php', null);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('miscellaneous.php'),
            ], 'misc-config');

            $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations'),
            ], 'miscellaneous-migrations');
        }

        Subscription::observe(SubscriptionObserver::class);
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

        $this->app->singleton(ContactService::class);
        $this->app->singleton(SubscriptionService::class);
    }

    /**
     * {@inheritDoc}
     */
    public function routeConfiguration(): array
    {
        return [
            'prefix'     => config('miscellaneous.prefix'),
            'middleware' => config('miscellaneous.middlewares'),
        ];
    }
}

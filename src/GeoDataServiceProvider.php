<?php

namespace JuiceCRM\GeoData;

use Illuminate\Support\ServiceProvider;
use JuiceCRM\GeoData\Console\Commands\Extract;
use JuiceCRM\GeoData\Console\Commands\Refresh;
use JuiceCRM\GeoData\Console\Commands\Retrieve;
use JuiceCRM\GeoData\Console\Commands\Store;

class GeoDataServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Extract::class,
                Refresh::class,
                Retrieve::class,
                Store::class,
            ]);
        }

        $this->publishes([
        	__DIR__.'/../config/geodata.php' => base_path('config/geodata.php'),
        ], 'config');

        /*
         * Load Database Migrations
         */
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/geodata.php', 'geodata');
    }
}

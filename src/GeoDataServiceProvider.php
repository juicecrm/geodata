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
        /*
         * Remove if your package does not have a console command.
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                Extract::class,
                Refresh::class,
                Retrieve::class,
                Store::class,
            ]);
        }

        /*
         * Remove if your package does not have routes.
         */
        // Route::controller(SkeletonController::class)
        // 	->prefix('skeleton')
        // 	->group(function() {
        // 		Route::get('', 'index');
        // 	});

        /*
         * Remove if your package does not have views.
         */
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'juicecrm-skeleton');
        // $this->publishes([
        // 	__DIR__.'/../resources/views' => resource_path('views/vendor/juicecrm-skeleton'),
        // ], 'geodata-views');

        /*
         * Remove if your package does not have a config file.
         */
        // $this->publishes([
        // 	__DIR__.'/../config/juicecrm-skeleton.php' => base_path('config/juicecrm-skeleton.php'),
        // ], 'geodata-config');

        /*
         * Publish Database Migrations
         */
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'geodata-migrations');

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
        /*----------------------------------------------------------------------
        | Using Facades
        |-----------------------------------------------------------------------
        |
        | If you want to use a Facade in your package, please alter the code
        | below, and create a class in the Facades directory that extends
        | Illuminate\Support\Facades\Facade and implements the
        | getFacadeAccessor() function. That function should return the same
        | that the code below also uses.
        |
        */

        // $this->app->bind('skeleton-facade', function () {
        // 	return new Skeleton();
        // });

        /*
         * Remove if your package does not have a config file.
         */
        // $this->mergeConfigFrom(__DIR__.'/../config/juicecrm-skeleton.php', 'juicecrm-skeleton');
    }
}

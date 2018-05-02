<?php

namespace CleaniqueCoders\Themer;

use Illuminate\Support\ServiceProvider;

class ThemerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Register Commands
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                \CleaniqueCoders\Themer\Console\Commands\Theme::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}

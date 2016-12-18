<?php

namespace Cleaniquecoders\Themer;

use Illuminate\Support\ServiceProvider;

class ThemerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $commands = [];

        if ($this->app->runningInConsole()) {

            if ($this->app->environment('local', 'staging')) {
                $commands[] = \CleaniqueCoders\Themer\Console\Commands\Theme::class;
            }

            $this->commands($commands);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

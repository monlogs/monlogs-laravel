<?php

namespace DesignCoda\Monlogs;

use Illuminate\Support\ServiceProvider;
use DesignCoda\Monlogs\Monlogs;

class MonlogsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('monlogs', function () {
            return new Monlogs();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

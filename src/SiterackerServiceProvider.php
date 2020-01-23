<?php

namespace DesignCoda\Siteracker;

use Illuminate\Support\ServiceProvider;
use DesignCoda\Siteracker\Siteracker;

class SiterackerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('siteracker', function () {
            return new Siteracker();
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

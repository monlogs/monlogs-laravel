<?php

namespace DesignCoda\Monlogs;

use Illuminate\Support\ServiceProvider;
use DesignCoda\Monlogs\Monlogs;
use Illuminate\Log\Events\MessageLogged;

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
        \Log::listen(function (MessageLogged $msg) {
		    if($msg->level == "error") {
				try (
					Monlogs::sendError($msg->context['exception']);
				) catch (Exception $ex) {
					info($ex->getTraceAsString());
				}
			}
		});
    }
}

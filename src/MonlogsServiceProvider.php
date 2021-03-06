<?php

namespace DesignCoda\Monlogs;

use DesignCoda\Monlogs\Monlogs;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\ServiceProvider;
use Log;

class MonlogsServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('monlogs', function () {
            return new Monlogs;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Log::listen(function ($msg) {
            if(isset($msg) && $msg instanceOf MessageLogged && isset($msg->level) && $msg->level == "error") {
                try {
                    if(isset($msg->context['exception'])) {
                        Monlogs::sendError($msg->context['exception']);
                        sleep(10);
                    } else {
                        logger('Monlogs: No exception in message');
                    }
                } catch (Exception $ex) {
                    info($ex->getTraceAsString());
                }
            }
        });
    }

}

<?php

namespace DesignCoda\Monlogs;

use Illuminate\Support\Facades\Facade;

/**
 * Class SiterackerFacade
 * @package DesignCoda\Siteracker
 */
class MonlogsFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'monlogs';
    }
}
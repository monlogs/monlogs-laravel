<?php

namespace DesignCoda\Siteracker;

use Illuminate\Support\Facades\Facade;

/**
 * Class SiterackerFacade
 * @package DesignCoda\Siteracker
 */
class SiterackerFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'siteracker';
    }
}
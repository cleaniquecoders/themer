<?php

namespace CleaniqueCoders\Themer;

use Illuminate\Support\Facades\Facade;

class ThemerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Themer';
    }
}

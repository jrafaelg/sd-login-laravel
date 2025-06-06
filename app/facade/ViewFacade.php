<?php

namespace App\facade;

use Illuminate\Support\Facades\Facade;

class ViewFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'viewFacade';
    }
}

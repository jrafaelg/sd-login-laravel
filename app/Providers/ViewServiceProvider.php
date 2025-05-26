<?php

namespace App\Providers;

use App\Library\ViewLibrary;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->bind('viewFacade', fn() =>  new ViewLibrary());


        //$this->app->alias(ViewLibrary::class, 'viewLibrary');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layouts.navbar', 'App\Http\Composers\NavbarComposer');
        view()->composer('layouts.javascript', 'App\Http\Composers\JavascriptComposer');
        view()->composer('room.subnav', 'App\Http\Composers\RoomSubnavComposer');
        view()->composer('other.steps', 'App\Http\Composers\StepsComposer');
        view()->composer('room.partials.chat', 'App\Http\Composers\ChatComposer');
    }
}

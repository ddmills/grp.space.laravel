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
        view()->composer('other.steps', 'App\Http\Composers\StepsComposer');
    }
}
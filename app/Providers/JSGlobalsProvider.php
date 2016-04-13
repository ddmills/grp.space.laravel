<?php

namespace App\Providers;

use App\JSGlobals;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class JSGlobalsProvider extends ServiceProvider
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
        $this->app->singleton('JSGlobals', function ($app) {
            return new JSGlobals();
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Railway terminates SSL at its edge proxy and forwards requests to
        // the app over plain HTTP. Without this, Laravel generates http://
        // links for routes/assets, which browsers flag as "not secure".
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
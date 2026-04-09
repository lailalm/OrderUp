<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(\App\Services\MenuService::class);
        $this->app->singleton(\App\Services\KaryawanService::class);
        $this->app->singleton(\App\Services\MejaService::class);
        $this->app->singleton(\App\Services\PemesananService::class);
        $this->app->singleton(\App\Services\StatistikService::class);
    }

    public function boot(): void
    {
        //
    }
}

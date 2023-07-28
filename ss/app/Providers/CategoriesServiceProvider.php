<?php

namespace App\Providers;

use App\Services\CategoriesService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class CategoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CategoriesService::class, function (Application $app) {
            return new CategoriesService();
        });
    }

    public function boot(): void
    {
        //
    }
}

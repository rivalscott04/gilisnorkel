<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        $masterMenuJson = file_get_contents(base_path('resources/json/masterMenu.json'));
        $masterMenuData = json_decode($masterMenuJson);

        // Share all menuData to all the views
        View::share('menuData', [$masterMenuData]);
    }
}

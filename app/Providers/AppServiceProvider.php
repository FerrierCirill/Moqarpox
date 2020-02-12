<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::directive('isClient', function ($expression) {

        });
        Blade::directive('isProvider', function ($expression) {

        });
        Blade::directive('isAdmin', function () {
            if(\Auth::user()->admin == \App\User::ADMIN) return true;
            else return false;
        });
    }
}

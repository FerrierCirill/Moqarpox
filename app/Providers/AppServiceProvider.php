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

        Blade::if('isClient', function () {
            if(\Auth::check() && \Auth::user()->state == \App\User::CLIENT) return true;
            else return false;
        });
        Blade::if('isProvider', function () {
            if(\Auth::check() && \Auth::user()->state == \App\User::PROVIDER) return true;
            else return false;
        });
        Blade::if('isAdmin', function () {
            if(\Auth::check() && \Auth::user()->admin == \App\User::ADMIN) return true;
            else return false;
        });
        Blade::if('isLog', function () {
            if(\Auth::check()) return true;
            else return false;
        });
    }
}

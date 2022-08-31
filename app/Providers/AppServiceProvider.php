<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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

        Paginator::useBootstrapFive();

        // Blade Directives
        Blade::if('hasCharacter', function () {
            if (Auth::check()) {
                return (Auth::user()->character);
            }
            return false;
        });

        Blade::if('IsVendor', function () {
            if (Auth::check() && Auth::user()->character) {
                return Auth::user()->character->shop;
            }
            return false;
        });

        Blade::if('hasAmount', function ($field, $amount) {
            if (Auth::check() && Auth::user()->character) {
                if (!is_null($amount)) {
                    if (Auth::user()->character->$field >= $amount) {
                        return true;
                    }
                    return false;
                }
            }
        });
    }
}

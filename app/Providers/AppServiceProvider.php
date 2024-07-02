<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;

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
        RedirectIfAuthenticated::redirectUsing(function (Request $request) {
            if ($request->user()->hasRole('admin')) {
                return route('employee.index');
            } elseif ($request->user()->hasRole('employee')) {
                return route('request');
            }

            return '/';
        });
    }
}

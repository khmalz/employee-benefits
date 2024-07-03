<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

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

        view()->composer('dashboard.layouts.navbar', function ($view) {
            $user = request()->user();

            if ($user && $user->hasRole('employee')) {
                $unreadNotifications = $user->unreadNotifications()->get();
                $view->with('unreadNotifications', $unreadNotifications);
            } else {
                $view->with('unreadNotifications', collect());
            }
        });
    }
}

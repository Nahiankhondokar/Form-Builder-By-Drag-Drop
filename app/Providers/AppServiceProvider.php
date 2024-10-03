<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        // Defining a gate for checking if the user is an organizer
        Gate::define('organizer', function ($user) {
            return $user->role == 'organizer';
        });

        Gate::define('user', function ($user) {
            return $user->role == 'user';
        });
    }
}

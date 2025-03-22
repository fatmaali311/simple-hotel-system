<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
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
        Inertia::share([
            'auth' => [
                'user' => Auth::check() ? [
                    'id' => Auth::id(),
                    'permissions' => Auth::user()->getPermissionNames(),
                ] : null
            ]
        ]);
        Log::info('Authenticated User:', ['user' => Auth::user()]);
    }
   
}

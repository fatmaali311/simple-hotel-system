<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
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
<<<<<<< HEAD
        Inertia::share([
            'auth' => [
                'user' => Auth::check() ? [
                    'id' => Auth::id(),
                    'permissions' => Auth::user()->permissions->pluck('name')->toArray(), // Fetch permissions correctly

                ] : null
            ]
        ]);
        Log::info('Authenticated User:', ['user' => Auth::user()]);
    }
   
=======
       }

>>>>>>> c249f7927bcd1c14590fe12e06622c4db3fad1cf
}

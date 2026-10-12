<?php

namespace App\Providers;

use App\Auth\PepperUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Auth::provider('pepper', function ($app, array $config) {
            return new PepperUserProvider(
                $app->make('hash'),
                $config['model']
            );
        });
    }
}
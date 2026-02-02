<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        /**
         * REQUIRED: Login rate limiter (Fortify uses throttle:login)
         */
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->input('email');

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        /**
         * REQUIRED: Two-factor rate limiter (even if you don’t use 2FA)
         */
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by(
                optional($request->session())->get('login.id')
            );
        });
    }
}

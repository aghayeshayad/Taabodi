<?php

namespace App\Providers;

use App\Services\Cart;
use App\Services\Payment;
use Illuminate\Support\ServiceProvider;
use Shetabit\Multipay\Invoice;

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
        app()->setLocale((request()->segment(1) == 'dashboard') ? 'en' : request()->segment(1));

        app()->bind('Cart', function () {
            return new Cart();
        });

        app()->bind('Payment', function ($app) {
            return new Payment($app->make(Invoice::class));
        });
    }
}

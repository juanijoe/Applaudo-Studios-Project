<?php

namespace App\Providers;

use App\Services\ExchangeRatesApi;
use Illuminate\Support\ServiceProvider;

class ExchangeRatesApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExchangeRatesApi::class,
            fn() => new ExchangeRatesApi(config('app.exchange_rates_api_key'))
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

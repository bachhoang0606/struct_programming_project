<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Contracts\Repositories\CoinCardRepositoryInterface',
            'App\Repositories\CoinCardRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\ProductRepositoryInterface',
            'App\Repositories\ProductRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\VoucherRepositoryInterface',
            'App\Repositories\VoucherRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\UserVoucherRepositoryInterface',
            'App\Repositories\UserVoucherRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\CaculatorRepositoryInterface',
            'App\Repositories\CaculatorRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\FreeshipRepositoryInterface',
            'App\Repositories\FreeshipRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\PercentDiscountRepositoryInterface',
            'App\Repositories\PercentDiscountRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\PriceDiscountRepositoryInterface',
            'App\Repositories\PriceDiscountRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\DashbroardRepositoryInterface',
            'App\Repositories\DashbroardRepository'
        );
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

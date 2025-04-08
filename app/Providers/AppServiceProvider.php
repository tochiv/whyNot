<?php

namespace App\Providers;

use App\Services\AvailableCarService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Price\PriceRepository;
use App\Repositories\Contracts\PriceRepositoryInterface;
use App\Repositories\Configuration\ConfigurationRepository;
use App\Repositories\Contracts\ConfigurationRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ConfigurationRepositoryInterface::class,
            ConfigurationRepository::class
        );

        $this->app->bind(
            PriceRepositoryInterface::class,
            PriceRepository::class
        );

        $this->app->singleton(AvailableCarService::class, function ($app) {
            return new AvailableCarService();
        });
    }

    public function boot(): void
    {
        //
    }
}

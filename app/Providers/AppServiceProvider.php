<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\Configuration;
use App\Models\Option;
use App\Models\Price;
use App\Observers\CarObserver;
use App\Observers\ConfigurationObserver;
use App\Observers\OptionObserver;
use App\Observers\PriceObserver;
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
        Car::observe(CarObserver::class);
        Price::observe(PriceObserver::class);
        Option::observe(OptionObserver::class);
        Configuration::observe(ConfigurationObserver::class);
    }
}

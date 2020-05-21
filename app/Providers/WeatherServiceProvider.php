<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use function Psy\bin;
use App\Repositories\Weather\WeatherRepositoryInterface;
use App\Repositories\Weather\WeatherRepositoryYandex;

/**
 * Провайдер для погоды
 * Class WeatherServiceProvider
 * @package App\Providers
 */
class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WeatherRepositoryInterface::class, function(){
            return new WeatherRepositoryYandex();
        });
    }
}

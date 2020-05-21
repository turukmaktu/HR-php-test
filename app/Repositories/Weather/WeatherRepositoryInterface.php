<?php


namespace App\Repositories\Weather;


interface WeatherRepositoryInterface
{
    public function getWeather(float $lat, float $lon);
}
<?php


namespace App\Repositories\Weather;

/*
 * Интерфейс для провайдера для получения погоды
 */
interface WeatherRepositoryInterface
{
    public function getWeather(float $lat, float $lon);
}
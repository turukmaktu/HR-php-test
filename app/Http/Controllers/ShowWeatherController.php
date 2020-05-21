<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Weather\WeatherRepositoryInterface;
use App\Contracts\MenuContract;

class ShowWeatherController extends Controller
{
    public function index(WeatherRepositoryInterface $weatherRepository){

        //координаты Брянска
        $lat = 34.389084;
        $lon = 53.236934;

        $temperature = $weatherRepository->getWeather($lat,$lon);

        return view('weather.show')
            ->with('temperature',$temperature)
            ->with('menu', MenuContract::getMenu(route('weather')));
    }
}

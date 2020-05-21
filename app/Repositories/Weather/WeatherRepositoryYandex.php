<?php
namespace App\Repositories\Weather;

class WeatherRepositoryYandex implements WeatherRepositoryInterface
{
    public function getWeather(float $lat, float $lon)
    {
        $apiKey = config('yandex.keys.weather');

        if(!$apiKey){
            throw new \Exception("не установленн ключ для api yandex погоды");
        }

        //guzl в текущей версии не работает, запрос делаю через curl
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.weather.yandex.ru/v1/forecast?lat={$lat}&lon={$lon}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "X-Yandex-API-Key: {$apiKey}",
            ),
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        try{
            return $response->fact->temp;
        }catch (\Exception $exception){
            return false;
        }
    }
}
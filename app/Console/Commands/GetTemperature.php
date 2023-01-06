<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

use App\Models\CityTemperature;
class GetTemperature extends Command
{
    protected $signature = 'temperature:get';

    protected $description = 'Get current temperature for city in env file';

    public function handle()
    {
        $city = env("CITY");
        $client = new Client();
        $responseFromApi = $client->get("https://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&APPID=50d9fefad98205bf4c9be9723dd15d3e");
        $weatherData = json_decode($responseFromApi->getBody());
        $temperatureNow = $weatherData->main->temp;

        $cityTemperature = new CityTemperature();
        $cityTemperature->temperature = $temperatureNow;
        $cityTemperature->date = date('Y-m-d');
        $cityTemperature->save();

        return $this->info($temperatureNow);
    }
}

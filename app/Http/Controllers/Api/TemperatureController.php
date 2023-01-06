<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CityTemperature;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    private $token = 'k3l049mvneo5lhj4566cdlotn5328cle';

    public function show($date,$token)
    {
        if($token != $this->token){
            return json_encode('Invalid Token!');
        }

        $cityTemperatures = CityTemperature::where('date',$date)->orderBy('id','ASC')->get(['created_at','temperature']);

        return json_encode($cityTemperatures);
    }

}

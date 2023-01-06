<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTemperature extends Model
{
    use HasFactory;

    protected $table = 'city_temperatures';
    protected $fillable = [
        'temperature'
    ];
}

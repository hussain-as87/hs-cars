<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarFeatuer extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'air_conditions',
        'child_seat',
        'gps',
        'luggage',
        'music',
        'seat_beit',
        'sleeping_bed',
        'water',
        'bluetooth',
        'onboard_computer',
        'audio_input',
        'long_term_trips',
        'car_kit',
        'remote_central_locking',
        'climate_control',
    ];
    protected $table = "car_features";
    public $timestamps = false;

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

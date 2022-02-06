<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPricing extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "car_pricing";

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

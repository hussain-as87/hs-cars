<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarFeatuer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "car_features";

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

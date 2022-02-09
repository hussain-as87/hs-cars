<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPricing extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'in_houre',
        'in_day',
        'in_month'
    ];
    protected $table = "car_pricing";
    public $timestamps = false;
    
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

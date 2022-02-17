<?php

namespace App\Models;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentCar extends Model
{
    use HasFactory;
    protected $fillable = ['rent_id', 'car_id', 'amount', 'quantity', 'price'];
    protected $table = 'rent_cars';
    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

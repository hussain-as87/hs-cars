<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'car_id',
        'location',
        'drop_off_location',
        'pik_up_time',
        'pik_up_date',
        'drop_off_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

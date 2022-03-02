<?php

namespace App\Models;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'car_id', 'rating', 'review'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function car()
    {
        return $this->belongsTo(Car::class)->withDefault();
    }
}

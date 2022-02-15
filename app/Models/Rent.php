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
        'location',
        'drop_off_location',
        'pik_up_time',
        'pik_up_date',
        'drop_off_date',
        'total_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'rent_cars')
            ->using(RentCar::class)/*model of relation between orders & products */
            ->withPivot(['amount'])->as('details');
    }
}

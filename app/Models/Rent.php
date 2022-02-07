<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'pik_off_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

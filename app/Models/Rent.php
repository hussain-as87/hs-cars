<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Support\Facades\DB;
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
        return $this->belongsTo(User::class)->withDefault();
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'rent_cars')
            ->using(RentCar::class)/*model of relation between orders & products */
            ->withPivot(['amount'])->as('details');
    }
    public static function SaleInMonth()
    {
        return DB::select("SELECT monthname(r.created_at) AS month,
                                 year(r.created_at) AS year,
                                 COUNT( DISTINCT r.id ) AS count,
                                 SUM(rc.quantity * rc.price) AS total,
                                 SUM(rc.car_id) AS cars
                                    from rents as r INNER JOIN rent_cars as rc ON rc.rent_id = r.id
                                    GROUP BY month , year
                                    HAVING SUM(rc.quantity * rc.price) > 200
                                    ORDER BY total ASC");
    }
}

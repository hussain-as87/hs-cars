<?php

namespace App\Models;

use App\Models\Rent;
use App\Models\Review;
use App\Models\RentCar;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory, HasTranslations, SearchableTrait, SoftDeletes;

    public $translatable = ['name', 'description'];

    public $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'image',
        'mileage',
        'transmission_type',
        'seats',
        'luggage',
        'fuel'
    ];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'cars.name' => 10,
            'cars.description' => 10,
            'cars.mileage' => 10,
            'cars.transmission_type' => 10,
            'cars.seats' => 10,
            'cars.luggage' => 10,
            'cars.fuel' => 10,
            'cars.id' => 10,
        ],
        'joins' => [
            'users' => ['cars.user_id', 'users.id'],
        ],
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feature()
    {
        return $this->hasOne(CarFeatuer::class);
    }

    public function pricing()
    {
        return $this->hasOne(CarPricing::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Rent::class, 'rent_cars')
            ->using(RentCar::class)
            ->withPivot(['amount'])
            ->as('details');
    }
}

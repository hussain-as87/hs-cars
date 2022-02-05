<?php

namespace App\Models;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory, HasTranslations ,SearchableTrait;
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
        ]

          ,
          'joins' => [
              'users' => ['cars.user_id','users.id'],
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

}

<?php

namespace App\Models\Admin;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasTranslations, SearchableTrait, SoftDeletes;

    public $translatable = ['name', 'description'];

    public $fillable = [
        'user_id',
        'name',
        'description',
        'logo',
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
            'categories.name' => 10,
            'categories.description' => 10,
            'categories.id' => 10,
        ],
        'joins' => [
            'users' => ['categories.user_id', 'users.id'],
        ],
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}

<?php

namespace App\Models;

use App\Models\Car;
use App\Models\Rent;
use App\Models\Admin\Like;
use App\Models\Admin\Post;
use App\Models\Admin\About;
use App\Models\Admin\Advert;
use App\Models\Admin\Comment;
use App\Models\Admin\Profile;
use App\Models\Admin\Service;
use App\Models\Admin\Category;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles
    , SearchableTrait;

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'users.name' => 10,
            'users.username' => 10,
            'users.email' => 10,
            'users.id' => 10,
        ]
        //  ,
        //  'joins' => [
        //      'products' => ['categories.id','products.category_id'],
        //      'sub_categories' => ['categories.id','sub_categories.category_id'],
        //  ],
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
    public function about()
    {
        return $this->hasOne(About::class);
    }
    public function advert()
    {
        return $this->hasOne(Advert::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

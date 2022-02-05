<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advert extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title', 'description'];

    public $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'video',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cohensive\Embed\Facades\Embed;

class Advert extends Model
{
    use HasFactory, HasTranslations;

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

    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->video)->parseUrl();

        if (!$embed)
            return '';

        //$embed->setAttribute(['width' => 50]);
        return $embed->getHtml();
    }
}

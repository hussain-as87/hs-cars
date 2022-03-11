<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisableReview extends Model
{
    use HasFactory;
    protected $fillable =['review_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function review()
    {
        return $this->belongsTo(Review::class)->withDefault();
    }
}

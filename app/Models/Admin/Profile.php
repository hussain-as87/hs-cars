<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=[
       'user_id',
       'f_name',
       'l_name',
       'avatar',
       'background_image',
       'address',
       'country',
       'city',
       'postal_code',
       'date_of_birth',
       'about_me',
       'them',
    ];
    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    /*     public $timestamps = false;
     */
    protected $fillable = [
        'name',
        'value',
    ];
}

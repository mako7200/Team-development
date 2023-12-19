<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;
    function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    function users()
    {
        return $this->hasMany('App\Models\Users');
    }
}

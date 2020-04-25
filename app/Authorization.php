<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    protected $fillable = [
        'authorization_name' , 'auth_image' , 'status', 'auth_type'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city_name',
    ];

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}

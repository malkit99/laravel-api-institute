<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $fillable = [
        'state_name','country_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}

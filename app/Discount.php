<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Discount extends Model
{
    protected $dates = [
        'last_date'
    ];
    public function setLastDateAttribute($date)
    {
        $this->attributes['last_date'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    protected $dates = [
        'start_date',
        'last_date'
    ];

    public function setStartDateAttribute($date)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('Y-m-d', $date);
    }
    public function setLastDateAttribute($date)
    {
        $this->attributes['last_date'] = Carbon::createFromFormat('Y-m-d', $date);
    }

}

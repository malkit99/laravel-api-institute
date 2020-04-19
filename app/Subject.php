<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subject extends Model
{
    protected $fillable = [
        'subject_name',
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

}

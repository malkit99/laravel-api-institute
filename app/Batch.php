<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{

    protected $fillable = [
        'batch_size',
    ];

    protected $guard_name = 'airlock';

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}

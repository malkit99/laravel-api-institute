<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseFee extends Model
{
    public function course()
    {
        return $this->hasMany(Course::class);
    }

}

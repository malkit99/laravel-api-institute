<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function course_code()
    {
        return $this->belongsTo(CourseCode::class);
    }

    public function course_fee()
    {
        return $this->belongsTo(CourseFee::class);
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }

    public function discount()
    {
        return $this->hasOne('App\Discount');
    }




}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function courses()
   {
       return $this->hasMany(Course::class);
   }
}

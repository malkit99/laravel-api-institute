<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'topic_name', 'topic_description'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}

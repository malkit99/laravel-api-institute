<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'content_name', 'topic_name', 'topic_description','mobile'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}

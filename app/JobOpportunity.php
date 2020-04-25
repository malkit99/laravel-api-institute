<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOpportunity extends Model
{
    protected $fillable = [
        'company_name' , 'job_image' , 'status',
    ];
}

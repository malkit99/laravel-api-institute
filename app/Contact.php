<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use Notifiable ;
    public function routeNotificationForNexmo($notification)
    {
        return $this->mobile;
    }
}

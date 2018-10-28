<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegistrationEvent extends Model
{
   protected $fillable= [
       'event_id_event','user_id_user'
   ];
}

<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Events extends Authenticatable {

    use Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','date_initial' ,'date_finish', 
        'local', 'time','time_expiration','city','vacancies',
        'target_audience','arquivo'
    ];
   

}

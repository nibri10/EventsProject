<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description','date_initial' ,'date_finish',
        'local', 'time','time_expiration','city','vacancies',
        'target_audience','arquivo'
    ];


}

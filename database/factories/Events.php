<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->name,
        'date_initial'=>$faker->date,
        'date_finish'=>$faker->date,
        'local'=>$faker->Address,
        'time'=>$faker->time,
        'time_expiration'=>$faker->time,
        'city'=>$faker->city,
        'arquivo'=>'1',
        'vacancies'=>$faker->randomDigit,
        'target_audience'=>$faker->name,
        
    ];
});


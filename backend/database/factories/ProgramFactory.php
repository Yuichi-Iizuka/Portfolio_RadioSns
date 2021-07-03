<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Program;
use App\User;
use Faker\Generator as Faker;

$factory->define(Program::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->text(100),
        'tag' => $faker->text(10),
        'start_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 week')->format('Y-m-d'),
        'start_time' => $faker->time('H:i:s'),
        'user_id' => function(){
            return factory(User::class);
        }
    ];
});

<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        //
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->streetAddress,
        'gender' => $faker->randomElement($array = array ('M','F')),
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'created_at' => $faker->dateTime(now()),
        'updated_at' => $faker->dateTime(now())
    ];
});

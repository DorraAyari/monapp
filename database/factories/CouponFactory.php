<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;


$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'code'=> $faker->sentence,
        'percent_off'=> $faker->sentence
        
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Catalogue;
use Faker\Generator as Faker;

$factory->define(Catalogue::class, function (Faker $faker) {
    return [
        'name'=> $faker->word,
        'description'=>$faker->sentence

    ];
});

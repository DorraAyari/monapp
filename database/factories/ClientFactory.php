<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
       
        'nom'=> $faker->name,
        'prenom'=> $faker->lastName,
        'email'=> $faker->email,
        'adresse'=> $faker->streetAddress,
        'telephone'=> $faker->phoneNumber    
    ];
});

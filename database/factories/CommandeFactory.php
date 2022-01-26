<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commande;
use Faker\Generator as Faker;

use App\Panier;

$factory->define(Commande::class, function (Faker $faker) {
    return [
        'date_commande'=>$faker->date,
        'num_commande'=> $faker->randomNumber(),
        'email'=> $faker->email,
        'prix_commande'=> $faker->randomFloat(3),
        'amount'=> $faker->randomNumber(),
        'products'=> $faker->sentence,
        'description_commande'=> $faker->sentence,
        'panier_id'=> Panier::get('id')->random()
    ];
});

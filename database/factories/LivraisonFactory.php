<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Livraison;
use Faker\Generator as Faker;

use App\Commande;

$factory->define(Livraison::class, function (Faker $faker) {
    return [
        'date_livraison'=>$faker->date,
        'description'=> $faker->sentence,
        'commande_id'=> Commande::get('id')->random()


    ];
});

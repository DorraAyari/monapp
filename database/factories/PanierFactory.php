<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Panier;
use App\Client;
use App\Produit;
use Faker\Generator as Faker;

$factory->define(Panier::class, function (Faker $faker) {
    return [
        'nbrArticle'=> $faker->randomNumber(),
        'totalPrix'=> $faker->randomFloat(3),
        'client_id'=>Client::get('id')->random(),
        'produit_id'=>Produit::get('id')->random()
    ];
});

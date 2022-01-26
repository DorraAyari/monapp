<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Commande;
use App\Paiement;
use Faker\Generator as Faker;

$factory->define(Paiement::class, function (Faker $faker) {
    return [
        'numero_montant'=> $faker->randomNumber(),
        'montant'=> $faker->randomFloat(3),
        'date_paiement'=> $faker->date,
        'date_expiration'=> $faker->date,
        'commande_id'=> Commande::get('id')->random(),
        'email'=> $faker->email
    ];
});

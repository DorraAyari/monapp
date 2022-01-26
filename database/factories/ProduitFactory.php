<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use App\Catalogue;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    return [
        'produits_nom'=> $faker->word,
        'produits_description'=> $faker->sentence,
        'price'=>$faker->randomFloat(3),
        'catalogue_id'=>Catalogue::get('id')->random(),
        'pics'=>$faker->imageUrl,
        'email'=> $faker->email,
    ];
});

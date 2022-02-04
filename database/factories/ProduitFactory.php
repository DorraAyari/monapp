<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use App\Catalogue;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence(4),
                'slug' => $faker->slug,
                'subtitle' => $faker->sentence(5),
                'description' => $faker->text,
                'price' => $faker->numberBetween(15, 300) * 100,
                'image' =>$faker->imageUrl,
        'catalogue_id'=>Catalogue::get('id')->random(),
      


    ];
});

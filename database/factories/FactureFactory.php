<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Facture::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'date_limite' => $faker->dateTime(),
        'details' => $faker->word,
        'montant' => $faker->randomFloat(),
        'debut_consommation' => $faker->dateTime(),
        'fin_consommation' => $faker->dateTime(),
    ];
});

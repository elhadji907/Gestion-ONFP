<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Formation::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'date' => $faker->dateTime(),
        'valeur' => $faker->word,
        'compteurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'factures_id' => function () {
            return factory(App\Facture::class)->create()->id;
        },
        'agents_id' => function () {
            return factory(App\Agent::class)->create()->id;
        },
        'name' => $faker->name,
    ];
});

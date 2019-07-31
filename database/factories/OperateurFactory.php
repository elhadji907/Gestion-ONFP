<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Operateur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero_agrement' => $faker->word,
        'administrateurs_id' => function () {
            return factory(App\Administrateur::class)->create()->id;
        },
    ];
});

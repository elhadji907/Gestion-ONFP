<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DomainesHasOperateur::class, function (Faker $faker) {
    return [
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
    ];
});

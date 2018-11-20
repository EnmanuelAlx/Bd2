<?php

use Faker\Generator as Faker;

$factory->define(App\Orden::class, function (Faker $faker) {
    return [
        'status' => $faker->numberBetween(0, 1),
        'fechaEnvio' => $faker->dateTimeThisDecade,
        'fechaEntrega' => $faker->dateTimeThisDecade,
        'created_at' => $faker->dateTimeThisDecade,
        'updated_at' => $faker->dateTimeThisDecade,

    ];
});

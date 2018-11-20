<?php

use Faker\Generator as Faker;

$factory->define(App\Adicional::class, function (Faker $faker) {
    return [
        'precio' => $faker->numberBetween($min = 1, $max = 500),
        'created_at' => $faker->dateTimeThisDecade,
        'updated_at' => $faker->dateTimeThisDecade,
    ];
});

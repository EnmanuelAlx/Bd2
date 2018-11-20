<?php

use Faker\Generator as Faker;

$factory->define(App\Sucursal::class, function (Faker $faker) {
    return [
        'telefono' => $faker->phoneNumber,
        'direccion' => $faker->country,
        'created_at' => $faker->dateTimeThisDecade,
        'updated_at' => $faker->dateTimeThisDecade,
    ];
});

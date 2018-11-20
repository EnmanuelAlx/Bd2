<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'precio' => $faker->numberBetween($min = 1, $max = 10000),
        'descripcion' => $faker->firstName,
        'created_at' => $faker->dateTimeThisDecade,
        'updated_at' => $faker->dateTimeThisDecade,
        
    ];
});

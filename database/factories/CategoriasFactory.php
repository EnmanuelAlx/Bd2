<?php

use Faker\Generator as Faker;
use App\Categoria;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->jobTitle,
    ];
});

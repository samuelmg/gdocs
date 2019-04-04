<?php

use Faker\Generator as Faker;

$factory->define(App\Funcionario::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'cargo' => $faker->sentence(5),
    ];
});

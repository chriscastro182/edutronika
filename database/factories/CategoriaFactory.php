<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Categoria::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence,
    ];
});

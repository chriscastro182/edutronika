<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Producto::class, function (Faker $faker) {
    $width=320;
    $height=240;
    return [
        'nombre' => $faker->sentence,
        'precio' => $faker->randomFloat(2, 1,1000),
        'description' => $faker->sentence(6),
        'stock' => $faker->numberBetween(1,499),
        'promedio' => $faker->randomFloat(2, 1,5),
        'image' => $faker->imageUrl($width, $height),
        'categoria_id' => rand(1,13),
    ];
});

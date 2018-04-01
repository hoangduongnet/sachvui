<?php

use Faker\Generator as Faker;

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'author' => $faker->name(),
        'description' => $faker->text(500),
    ];
});

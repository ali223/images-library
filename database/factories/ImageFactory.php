<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'image_path' => $faker->imageUrl(),
        'thumbnail_path' => $faker->imageUrl()
    ];
});

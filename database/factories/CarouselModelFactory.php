<?php
use App\Shop\Carousels\Carousel;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Carousel::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'link' => $faker->url,
        'src' => $faker->url,
    ];
});

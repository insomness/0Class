<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'judul' => $faker->sentence(),
        'embed' => $faker->bothify(),
        'kelas_id' => rand(1,5),
    ];
});

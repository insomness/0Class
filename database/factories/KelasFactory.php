<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kelas;
use Faker\Generator as Faker;

$factory->define(Kelas::class, function (Faker $faker) {
    return [
        'nama_kelas' => $faker->randomElement(['web development', 'FLutter', 'Fullstack Javascript']),
        'jenis_kelas' => $faker->randomElement(['gratis', 'regular', 'premium']),
        'thumbnail'=> 'frontTemplate/img/cource/cource_1.png',
        'deskripsi' => $faker->paragraph(),
    ];
});

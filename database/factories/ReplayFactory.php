<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Replay::class, function (Faker $faker) {
//    return [
//        // 'name' => $faker->name,
//    ];

    $time = $faker->dateTimeThisMonth();

    return [
        'content' => $faker->sentence(),
        'created_at' => $time,
        'updated_at' => $time,
    ];
});

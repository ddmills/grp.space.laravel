<?php

$factory->define(App\Models\User::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->email,
        'username' => str_slug($faker->unique()->username),
        'password' => Hash::make(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Room::class, function(Faker\Generator $faker) {
    return [
        'name' => str_slug($faker->unique()->company),
        'access' => 'public',
        'description' => $faker->realText(80),
    ];
});

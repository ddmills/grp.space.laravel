<?php

$factory->define(App\User::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Room::class, function(Faker\Generator $faker) {
    return [
        'name' => str_slug($faker->company),
        'access' => 'public',
        'description' => $faker->realText(80),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surnames' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'state_id' => rand(1,6),
        'boucher' => $faker->imageUrl,
        'created_at' =>$faker->dateTimeThisDecade,
        'updated_at' =>$faker->dateTimeThisDecade,
    ];
});

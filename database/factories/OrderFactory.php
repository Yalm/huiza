<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surnames' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'state_id' => rand(1,5),
        'voucher' => $faker->imageUrl,
        'created_at' =>$faker->dateTimeThisDecade,
        'updated_at' =>$faker->dateTimeThisDecade,
    ];
});

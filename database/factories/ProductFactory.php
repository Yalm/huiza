<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' =>$faker->catchPhrase,
        'price' => $faker->randomFloat(2,2,1000),
        'image' => $faker->imageUrl(1200,1485),
        'stock' => $faker->randomDigit,
        'characteristics' => $faker->realText(random_int(160,191)),        
        'description' =>$faker->realText(random_int(150,1500)),
        'category_id' => rand(1,6),
        'created_at' =>$faker->dateTimeThisDecade,
        'updated_at' =>$faker->dateTimeThisDecade,
    ];
});

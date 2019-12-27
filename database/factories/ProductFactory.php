<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([Product::UNAVAILABLE_PRODUCT, Product::AVAILABLE_PRODUCT]),
        //'image' => $faker->image('public/storage/images',640,480, 'technics', false'),
        'image' => $faker->imageUrl(640, 480, 'technics', true),
        'seller_id' => User::all()->random()->id
    ];
});

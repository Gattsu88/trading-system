<?php

namespace Database\Factories;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph(1),
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement([Product::UNAVAILABLE_PRODUCT, Product::AVAILABLE_PRODUCT]),
            //'image' => $faker->image('public/storage/images',640,480, 'technics', false'),
            'image' => $this->faker->imageUrl(640, 480, 'technics', true),
            'seller_id' => User::all()->random()->id
        ];
    }
}

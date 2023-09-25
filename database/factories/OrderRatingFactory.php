<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderRating>
 */
class OrderRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => function () {
                return Order::inRandomOrder()->first()->id;
            },
            'rating'=>$this->faker->numberBetween(1,5),
            'feedback'=>$this->faker->paragraph
        ];
    }
}

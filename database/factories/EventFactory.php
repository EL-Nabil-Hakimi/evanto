<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'image' => '65eddf5d6f7f3.jpg',
        'title' => fake()->sentence(5),
        'description' => fake()->paragraph(3),
        'location' => fake()->address(),
        'date' => fake()->date(),
        'time' => fake()->time(),
        'duration' => fake()->numberBetween(20 , 160),
        'price' => fake()->randomFloat(2, 10, 100),
        'total_places' => fake()->numberBetween(20, 100),
        'total_reservations' => 0,
        'status' => 1,
        'acceptation' => fake()->numberBetween(0, 1),
        'user_id' => 2,
        'category_id' => 3,
        ];
    }
}

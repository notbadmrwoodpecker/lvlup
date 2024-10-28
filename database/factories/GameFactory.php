<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = fake()->dateTimeBetween('-2 years');

        return [
            'title' => fake()->sentence(3),
            'publisher' => fake()->company(),
            'created_at' => $created_at,
            'updated_at' => fake()->dateTimeBetween($created_at, 'now')
        ];
    }
}

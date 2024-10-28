<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create some good games
        Game::factory(33)->create()->each(function($book) {
            $numberOfReviews = random_int(5, 30);
            Review::factory()
                ->count($numberOfReviews)
                ->good()
                ->for($book)
                ->create();
        });

        // Create some avergae games
        Game::factory(42)->create()->each(function($book) {
            $numberOfReviews = random_int(5, 30);
            Review::factory()
                ->count($numberOfReviews)
                ->average()
                ->for($book)
                ->create();
        });

        // Create some bad games
        Game::factory(16)->create()->each(function($book) {
            $numberOfReviews = random_int(5, 30);
            Review::factory()
                ->count($numberOfReviews)
                ->bad()
                ->for($book)
                ->create();
        });
    }
}

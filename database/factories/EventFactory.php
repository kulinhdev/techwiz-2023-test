<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'image' => fake()->imageUrl(),
            'price' => fake()->numberBetween(100, 100000),
            'user_id' => DB::table('users')->inRandomOrder()->first()->id,
            'category_id' => DB::table('categories')->inRandomOrder()->first()->id,
            'start_time' => now(),
            'description' => fake()->text(),
        ];
    }
}

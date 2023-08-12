<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => DB::table('users')->inRandomOrder()->first()->id,
            'event_id' => DB::table('events')->inRandomOrder()->first()->id,
            'is_paid' => fake()->boolean,
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

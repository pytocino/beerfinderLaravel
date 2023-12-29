<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Local>
 */
class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => fake()->company(),
            'description' => fake()->text(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'image' => fake()->imageUrl(),
            'address' => fake()->address(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'city' => fake()->city(),
            'region' => fake()->country(),
            'website' => fake()->url(),
        ];
    }
}

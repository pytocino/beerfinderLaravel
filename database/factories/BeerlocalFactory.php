<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Beer;
use App\Models\Local;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beerlocal>
 */
class BeerlocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beer_id' => Beer::all()->random()->id,
            'local_id' => Local::all()->random()->id,
        ];
    }
}

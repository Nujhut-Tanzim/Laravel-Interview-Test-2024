<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'state_name' => $this->faker->state(),
            'area' => $this->faker->randomFloat(2, 1, 9999),
            'country_id' => Country::factory(),  // This creates and associates a country
        ];
    }
}

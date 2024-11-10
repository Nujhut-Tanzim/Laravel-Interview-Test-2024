<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'city_name' => $this->faker->city, 
            'population' => $this->faker->numberBetween(1000, 1000000), 
            'area' => $this->faker->randomFloat(2, 50, 500), 
            'state_id' => State::factory(), 
        ];
    }
}

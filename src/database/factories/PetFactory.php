<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'size' => $this->faker->randomElement([0, 1, 2]),
            'price' => $this->faker->numberBetween(100, 100000),
            'age' => $this->faker->numberBetween(0, 15),
        ];
    }
}

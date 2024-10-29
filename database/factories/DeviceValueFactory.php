<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeviceValue>
 */
class DeviceValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'device_id' => fake()->numberBetween(1, 4),
            'type' => fake()->randomElement(['temperature', 'humidity']),
            'value' => fake()->numberBetween(0, 100),
            'created_at' => now(),
        ];
    }
}

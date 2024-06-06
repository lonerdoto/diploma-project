<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'department' => fake()->colorName(),
            'director-name' => fake()->name(),
            'password' => '$2y$10$92IXUNpkjO0.uheWG/igi', // password
            'created_at' => fake()->dateTimeBetween('-2 month', 'now'),
        ];
    }


}

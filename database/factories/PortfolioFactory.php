<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->word(20,true),
            'image'=>fake()->imageUrl(),
            'description'=>fake()->paragraph(10,true),
            'skill_id'=>fake()->numberBetween(1,50),
            'user_id'=>fake()->numberBetween(1,50),
        ];
    }
}

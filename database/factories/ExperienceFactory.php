<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->word(5,true),
            'image'=>fake()->imageUrl(),
            'description'=>fake()->paragraph(6,true),
            'user_id'=>fake()->numberBetween(1,50),
        ];
    }
}

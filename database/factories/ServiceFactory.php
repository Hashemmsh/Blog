<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_service'=>fake()->word(5,true),
            'image'=>fake()->imageUrl(),
            'description'=>fake()->paragraph(5,true),
            'price'=>fake()->numberBetween(500,2000),
            'discount'=>fake()->numberBetween(10,200),
            'user_id'=>fake()->numberBetween(1,50)
        ];
    }
}

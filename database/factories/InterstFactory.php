<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interst>
 */
class InterstFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type'=>fake()->word(8,true),
            'name_intersts'=>fake()->word(20,true),
            'description'=>fake()->text(50),
            'user_id'=>fake()->numberBetween(1,50)
        ];
    }
}

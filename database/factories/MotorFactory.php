<?php

namespace Database\Factories;

use App\Models\Motor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Motor>
 */
class MotorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => fake()->randomElement(['Moteur V6', 'Moteur Électrique 50kW', 'Moteur Diesel Pro', 'Moteur Hybride', 'Moteur V8 Sport']),
        
        'reference' => fake()->unique()->bothify('MOT-####-??'),
        
        'price' => fake()->randomFloat(2, 500, 15000),
        
        'stock' => fake()->numberBetween(0, 50),
    ];
    }
}

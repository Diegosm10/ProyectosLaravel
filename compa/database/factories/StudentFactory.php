<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'apellido' => $this->faker->lastName,
        'nombre' => $this->faker->firstName,
        'dni' => $this->faker->unique()->numerify('########'),
        'fecha_nacimiento' => $this->faker->date(),
    ];
}
}

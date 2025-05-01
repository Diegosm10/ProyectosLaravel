<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_AR');
        return [
            'bio' => $faker->sentence(20),
            'location' => $faker->city,
            'github' => $faker->url,
            'linkedin' => $faker->url,
            'user_id' => User::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConstructionFactory extends Factory
{
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 year', 'now');
        return [
            'name' => $this->faker->company . ' Construction',
            'start_date' => $start,
            'end_date' => $this->faker->dateTimeBetween($start, '+6 months'),
            'province_id' => Province::inRandomOrder()->first()->id ?? Province::factory(),
        ];
    }
}


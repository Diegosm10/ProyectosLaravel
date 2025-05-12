<?php

namespace Database\Factories;

use App\Models\TypeMachine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'brand_model' => $this->faker->randomElement([
            'Caterpillar D6', 'Komatsu PC210', 'Volvo EC220', 'Doosan DX225', 'Hitachi EX200'
        ]),
            'kilometers' => $this->faker->numberBetween(5000, 25000),
            'type_machine_id' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


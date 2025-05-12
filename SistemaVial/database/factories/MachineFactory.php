<?php

namespace Database\Factories;

use App\Models\TypeMachine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'brand_model' => $this->faker->company . ' ' . strtoupper($this->faker->bothify('Model-###')),
            'kilometers' => $this->faker->numberBetween(1000, 200000),
            'type_machine_id' => TypeMachine::inRandomOrder()->first()->id ?? TypeMachine::factory(),
        ];
    }
}


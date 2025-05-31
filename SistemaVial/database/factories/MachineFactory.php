<?php
namespace Database\Factories;

use App\Models\TypeMachine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
    public function definition(): array
    {
        // Definir modelos según el tipo de máquina
        $machineModels = [
            1 => ['Caterpillar 320', 'Komatsu PC210', 'Volvo EC220'], // Excavadora
            2 => ['JCB 3CX', 'Case 580N', 'Komatsu WB93'], // Retroexcavadora
            3 => ['Mercedes-Benz Actros', 'Volvo FMX', 'Scania P410'], // Camión Volcador
            4 => ['Liebherr LTM 1090', 'Terex RT780', 'Grove GMK4100'], // Grúa
            5 => ['Caterpillar 930M', 'Volvo L90H', 'John Deere 524K'], // Pala Cargadora
            6 => ['Komatsu D65', 'Caterpillar D6', 'John Deere 850K'], // Topadora
            7 => ['Bomag BW213', 'Dynapac CA2500', 'Hamm H13i'], // Rodillo Compactador
            8 => ['Cifa CSS-3', 'Putzmeister P715', 'Schwing SP500'], // Hormigonera
            9 => ['Caterpillar 140M', 'Komatsu GD655', 'John Deere 770G'], // Motoniveladora
            10 => ['Bobcat S650', 'JCB 270', 'CASE SR210'] // Minicargadora
        ];
        
        $typeMachineId = $this->faker->numberBetween(1, 10);

        return [
            'brand_model' => $this->faker->randomElement($machineModels[$typeMachineId]),
            'kilometers' => $this->faker->numberBetween(5000, 25000),
            'type_machine_id' => $typeMachineId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


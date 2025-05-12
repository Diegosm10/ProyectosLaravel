<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeMachine;

class TypeMachineSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Excavadora',
            'Retroexcavadora',
            'Camión Volcador',
            'Grúa',
            'Pala Cargadora',
            'Topadora',
            'Rodillo Compactador',
            'Hormigonera',
            'Motoniveladora',
            'Minicargadora',
        ];

        foreach ($types as $type) {
            TypeMachine::create(['name' => $type]);
        }
    }
}

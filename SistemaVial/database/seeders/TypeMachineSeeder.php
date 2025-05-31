<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeMachine;

class TypeMachineSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'Excavadora', 'kilometers_maintenance' => 5000],
            ['name' => 'Retroexcavadora', 'kilometers_maintenance' => 6000],
            ['name' => 'Camión Volcador', 'kilometers_maintenance' => 10000],
            ['name' => 'Grúa', 'kilometers_maintenance' => 8000],
            ['name' => 'Pala Cargadora', 'kilometers_maintenance' => 7000],
            ['name' => 'Topadora', 'kilometers_maintenance' => 9000],
            ['name' => 'Rodillo Compactador', 'kilometers_maintenance' => 7500],
            ['name' => 'Hormigonera', 'kilometers_maintenance' => 8500],
            ['name' => 'Motoniveladora', 'kilometers_maintenance' => 9500],
            ['name' => 'Minicargadora', 'kilometers_maintenance' => 5500] 
        ];

        foreach ($types as $type) {
            TypeMachine::create($type);
        }
    }
}

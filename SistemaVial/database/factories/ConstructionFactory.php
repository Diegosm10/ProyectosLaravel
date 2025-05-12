<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConstructionFactory extends Factory
{
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 years', 'now');
        $tipoObra = $this->faker->randomElement([
            'Reconstrucción', 'Ampliación', 'Repavimentación', 'Obra Sanitaria', 'Restauración', 'Construcción'
        ]);
        $infraestructura = $this->faker->randomElement([
            'Ruta Nacional', 'Autopista', 'Puente', 'Centro Urbano', 'Hospital', 'Red de Agua Potable'
        ]);
        $provinceId = $this->faker->numberBetween(1, 23);
        $provinceName = Province::find($provinceId)->name;
        $numeroRuta = $this->faker->optional(0.6, '')->numberBetween(1, 100);
    
        return [
            'name' => "{$tipoObra} {$infraestructura}" . ($numeroRuta ? " {$numeroRuta}" : "") . " - {$provinceName}",
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween($startDate, '+5 years')->format('Y-m-d'),
            'province_id' => $provinceId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


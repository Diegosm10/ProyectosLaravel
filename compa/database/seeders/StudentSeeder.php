<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Instanciamos el generador de Faker
        $faker = Faker::create('es_AR');

        // Creamos 100 usuarios (ten en cuenta que el modelo User debe existir previamente)
        User::factory()->count(100)->create()->each(function ($user) use ($faker) {
            // Para cada usuario, creamos un estudiante asociado
            Student::create([
                'user_id' => $user->id,
                'last_name' => $faker->lastName,
                'name' => $faker->firstName,
                'dni' => $faker->unique()->numerify('########'),
                'birthdate' => $faker->date(),
            ]);
        });
    }
}

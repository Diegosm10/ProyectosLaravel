<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Ingeniería en Sistemas',
                'number_of_subjects' => 40,
                'description' => 'Formación en desarrollo de software, bases de datos y redes.',
            ],
            [
                'name' => 'Medicina',
                'number_of_subjects' => 60,
                'description' => 'Carrera orientada a la prevención, diagnóstico y tratamiento de enfermedades.',
            ],
            [
                'name' => 'Abogacía',
                'number_of_subjects' => 35,
                'description' => 'Estudio de las leyes y la justicia en la sociedad.',
            ],
            [
                'name' => 'Contador Público',
                'number_of_subjects' => 32,
                'description' => 'Enseñanza en contabilidad, auditoría e impuestos.',
            ],
            [
                'name' => 'Arquitectura',
                'number_of_subjects' => 42,
                'description' => 'Diseño y planificación de espacios habitables y urbanos.',
            ],
            [
                'name' => 'Psicología',
                'number_of_subjects' => 38,
                'description' => 'Estudio del comportamiento humano y los procesos mentales.',
            ],
            [
                'name' => 'Ingeniería Industrial',
                'number_of_subjects' => 44,
                'description' => 'Optimización de sistemas productivos y logísticos.',
            ],
            [
                'name' => 'Administración de Empresas',
                'number_of_subjects' => 36,
                'description' => 'Gestión organizacional, finanzas y recursos humanos.',
            ],
            [
                'name' => 'Profesorado en Educación Inicial',
                'number_of_subjects' => 30,
                'description' => 'Formación docente para nivel inicial.',
            ],
            [
                'name' => 'Diseño Gráfico',
                'number_of_subjects' => 28,
                'description' => 'Desarrollo de soluciones visuales para la comunicación.',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}

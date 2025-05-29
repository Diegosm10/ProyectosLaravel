<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ParameterMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parameter_maintenances')->insert([
            ['kilometers_maintenance' => 50000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

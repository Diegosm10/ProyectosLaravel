<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Construction;
use App\Models\Machine;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        $this->call(UserTableSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(TypeMachineSeeder::class);
        $this->call(MachineSeeder::class);
        $this->call(ConstructionSeeder::class);
    }
}

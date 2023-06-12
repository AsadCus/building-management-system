<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FormSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ValueSeeder;
use Database\Seeders\BuildingSeeder;
use Database\Seeders\MaintenanceSeeder;
use Database\Seeders\ExcludeMaintenanceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MaintenanceSeeder::class);
        $this->call(BuildingSeeder::class);
        $this->call(ExcludeMaintenanceSeeder::class);
        $this->call(FormSeeder::class);
        $this->call(ValueSeeder::class);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

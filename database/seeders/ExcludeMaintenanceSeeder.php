<?php

namespace Database\Seeders;

use App\Models\ExcludeMaintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExcludeMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $maintenance = [
            [
                'location_id' => '1',
                'floor_id' => '2',
                'room_id' => '1',
                'maintenance_id' => '2',
            ],                
            [
                'location_id' => '3',
                'floor_id' => '9',
                'room_id' => '13',
                'maintenance_id' => '2',
            ],                
        ];

        foreach ($maintenance as $key => $value) {
            ExcludeMaintenance::create($value);
        }
    }
}

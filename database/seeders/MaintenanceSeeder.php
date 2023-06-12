<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maintenance = [
            [
                'maintenance' => 'Indicator Panel',
                'description' => 'Indicator Panel Description',
                'frequency' => 'daily',
                'type' => 'equipment',
            ],
            [
                'maintenance' => 'Indicator AHU',
                'description' => 'Indicator AHU Description',
                'frequency' => 'six_h',
                'type' => 'equipment',
            ],
            [
                'maintenance' => 'Indicator PAM',
                'description' => 'Indicator PAM Description',
                'frequency' => 'daily',
                'type' => 'equipment',
            ],
            [
                'maintenance' => 'Kebersihan 6 Bulan',
                'description' => 'Kebersihan 6 Bulan Description',
                'frequency' => 'six_m',
                'type' => 'hygiene',
            ],
            [
                'maintenance' => 'Kebersihan 2 Bulan',
                'description' => 'Kebersihan 2 Bulan Description',
                'frequency' => 'two_m',
                'type' => 'hygiene',
            ],
            [
                'maintenance' => 'APAR',
                'description' => 'APAR Description',
                'frequency' => 'monthly',
                'type' => 'others',
            ],
            [
                'maintenance' => '2 Minggu',
                'description' => '2 Minggu Description',
                'frequency' => 'two_w',
                'type' => 'others',
            ],
        ];

        foreach ($maintenance as $key => $value) {
            Maintenance::create($value);
        }
    }
}

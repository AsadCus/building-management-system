<?php

namespace Database\Seeders;

use App\Models\LoginLocation;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'location_name' => 'DC Mampang',
                'regional' => 'Jakarta',
                'latitude' => '-6.2272569',
                'longitude' => '106.831212',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'address' => 'Gedung Ariobimo Rasuna said, Ruangan Basement',
                'status' => 'active',
            ],
            [
                'location_name' => 'Cyber',
                'regional' => 'Jakarta',
                'latitude' => '-6.23881',
                'longitude' => '106.8242011',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'address' => 'Gedung Cyber Lantai 10 ( Sewa Jalur Kabel Fiber Op...',
                'status' => 'active',
            ],
            [
                'location_name' => 'MNC Tower',
                'regional' => 'Jakarta',
                'latitude' => '-6.1840839',
                'longitude' => '106.831532',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'address' => 'Lantai 10 , suite 1001 ( All ), Lantai 12A, suite...',
                'status' => 'active',
            ],
        ];

        foreach ($locations as $key => $value) {
            LoginLocation::create($value);
        }

        $floors = [
            [
                'name' => 'Lantai 1',
                'location_id' => '1',
                'no_room_category' => true,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'name' => 'Lantai 2',
                'location_id' => '1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'name' => 'Lantai 3',
                'location_id' => '1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'name' => 'Lantai 1',
                'location_id' => '2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'name' => 'Lantai 2A',
                'location_id' => '2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'name' => 'Lantai 2B',
                'location_id' => '2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'inactive',
            ],
            [
                'name' => 'Lantai 10',
                'location_id' => '3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'name' => 'Lantai 11',
                'location_id' => '3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'name' => 'Lantai 12A',
                'location_id' => '3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
        ];

        foreach ($floors as $key => $value) {
            Floor::create($value);
        }

        $rooms = [
            [
                'floor_id' => 2,
                'name' => 'Ruangan DS',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 2,
                'name' => 'Ruangan QY',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 3,
                'name' => 'Ruangan GX',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'inactive',
            ],
            [
                'floor_id' => 3,
                'name' => 'Ruangan PX',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 4,
                'name' => 'Ruangan LL',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 4,
                'name' => 'Ruangan PS',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 5,
                'name' => 'Ruangan KD',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 5,
                'name' => 'Ruangan QW',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 6,
                'name' => 'Ruangan WO',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'inactive',
            ],
            [
                'floor_id' => 7,
                'name' => 'Ruangan OW',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 8,
                'name' => 'Ruangan LE',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 9,
                'name' => 'Ruangan JD',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
            [
                'floor_id' => 9,
                'name' => 'Ruangan MV',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'status' => 'active',
            ],
        ];

        foreach ($rooms as $key => $value) {
            Room::create($value);
        }
    }
}

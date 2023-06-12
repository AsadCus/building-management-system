<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            [
                'form_id' => '1',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
            [              
                'form_id' => '2',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
            [                
                'form_id' => '3',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
            [                
                'form_id' => '4',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
            [                   
                'form_id' => '5',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
            [                
                'form_id' => '6',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
            [                
                'form_id' => '7',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
            [                
                'form_id' => '8',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
            [                
                'form_id' => '9',
                'floor_id' => '2',
                'room_id' => '1',
                'user' => 'userTes',
                'value' => 'value',
            ],
        ];

        foreach ($values as $key => $value) {
            Value::create($value);
        }
    }
}

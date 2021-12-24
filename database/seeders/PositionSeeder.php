<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'position_type' => 'GK',
                'sport' => '1'
            ],
            [
                'position_type' => 'CB',
                'sport' => '1'
            ],
            [
                'position_type' => 'LB',
                'sport' => '1'
            ],
            [
                'position_type' => 'RB',
                'sport' => '1'
            ],
            [
                'position_type' => 'LWB',
                'sport' => '1'
            ],
            [
                'position_type' => 'RWB',
                'sport' => '1'
            ],
            [
                'position_type' => 'SW',
                'sport' => '1'
            ],
            [
                'position_type' => 'DM',
                'sport' => '1'
            ],
            [
                'position_type' => 'CM',
                'sport' => '1'
            ],
            [
                'position_type' => 'AM',
                'sport' => '1'
            ],
            [
                'position_type' => 'LM',
                'sport' => '1'
            ],
            [
                'position_type' => 'CF',
                'sport' => '1'
            ],
            [
                'position_type' => 'S',
                'sport' => '1'
            ]
        ];
        DB::table('position')->insert(
            $positions
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = [
            [
                'sport_name' => 'Football',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Basketball',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Tennis',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Baseball',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Golf',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Volleyball',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Badminton',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Rugby',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Table tennis',
                'type' => 'Ball'
            ],
            [
                'sport_name' => 'Pool',
                'type' => 'Ball'
            ]
        ];
        DB::table('sports')->insert(
            $sports
        );
    }
}

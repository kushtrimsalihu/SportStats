<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rank = [
            [
               
                'player_rank_id' => '12',
                'rank' => '2'
            ],
            [
                'player_rank_id' => '14',
                'rank' => '5'
            ],
            [
                'player_rank_id' => '15',
                'rank' => '6'
            ],
            [
                'player_rank_id' => '16',
                'rank' => '2'
            ],
            [
                'player_rank_id' => '17',
                'rank' => '11'
            ],
            [
                'player_rank_id' => '18',
                'rank' => '2'
            ],
            [
                'player_rank_id' => '19',
                'rank' => '4'
            ],
            [
                'player_rank_id' => '20',
                'rank' => '3'
            ],
            [
                'player_rank_id' => '21',
                'rank' => '10'
            ],
            [
                'player_rank_id' => '22',
                'rank' => '8'
            ],
            [
                'player_rank_id' => '23',
                'rank' => '1'
            ],
            [
                'player_rank_id' => '24',
                'rank' => '7'
            ],
            [
                'player_rank_id' => '25',
                'rank' => '1'
            ],
            [
                'player_rank_id' => '26',
                'rank' => '1'
            ],
            [
                'player_rank_id' => '27',
                'rank' => '9'
            ],


        ];
        DB::table('rank')->insert(
            $rank
        );
    }
}

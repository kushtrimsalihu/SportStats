<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OldRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oldrank = [
            [
               
                'old_player_rank_id' => '12',
                'old_rank' => '1'
            ],
            [
                'old_player_rank_id' => '14',
                'old_rank' => '5'
            ],
            [
                'old_player_rank_id' => '15',
                'old_rank' => '7'
            ],
            [
                'old_player_rank_id' => '16',
                'old_rank' => '2'
            ],
            [
                'old_player_rank_id' => '17',
                'old_rank' => '10'
            ],
            [
                'old_player_rank_id' => '18',
                'old_rank' => '2'
            ],
            [
                'old_player_rank_id' => '19',
                'old_rank' => '3'
            ],
            [
                'old_player_rank_id' => '20',
                'old_rank' => '4'
            ],
            [
                'old_player_rank_id' => '21',
                'old_rank' => '11'
            ],
            [
                'old_player_rank_id' => '22',
                'old_rank' => '8'
            ],
            [
                'old_player_rank_id' => '23',
                'old_rank' => '1'
            ],
            [
                'old_player_rank_id' => '24',
                'old_rank' => '6'
            ],
            [
                'old_player_rank_id' => '25',
                'old_rank' => '1'
            ],
            [
                'old_player_rank_id' => '26',
                'old_rank' => '2'
            ],
            [
                'old_player_rank_id' => '27',
                'old_rank' => '9'
            ],


        ];
        DB::table('old_rank')->insert(
            $oldrank
        );
    }
}

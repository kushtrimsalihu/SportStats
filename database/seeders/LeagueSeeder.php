<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leagues = [
            [
                'id' => '78',
                'country' => 'Germany',
                'name' => 'Bundesliga 1',
                'logo' => 'https://media.api-sports.io/football/leagues/78.png',
                'type' => 'league'
            ],
            [
                'id' => '39',
                'country' => 'England',
                'name' => 'Premier League',
                'logo' => 'https://media.api-sports.io/football/leagues/39.png',
                'type' => 'league'
            ],
            [
                'id' => '140',
                'country' => 'Spain',
                'name' => 'La Liga',
                'logo' => 'https://media.api-sports.io/football/leagues/140.png',
                'type' => 'league'
            ],
            [
                'id' => '94',
                'country' => 'Portugal',
                'name' => 'Primeira Liga',
                'logo' => 'https://media.api-sports.io/football/leagues/94.png',
                'type' => 'league'
            ],
            [
                'id' => '88',
                'country' => 'Netherlands',
                'name' => 'Eredivisie',
                'logo' => 'https://media.api-sports.io/football/leagues/88.png',
                'type' => 'league'
            ],
            [
                'id' => '144',
                'country' => 'Belgium',
                'name' => 'Jupiler Pro League',
                'logo' => 'https://media.api-sports.io/football/leagues/144.png',
                'type' => 'league'
            ],
            [
                'id' => '79',
                'country' => 'Germany',
                'name' => 'Bundesliga 2',
                'logo' => 'https://media.api-sports.io/football/leagues/79.png',
                'type' => 'league'
            ],
        ];
        DB::table('league')->insert(
            $leagues
        );
    }
}

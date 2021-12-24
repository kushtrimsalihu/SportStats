<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'team_id' => '165',
                'name' => 'Borussia Dortmund',
                'country' => 'Germany',
                'founded' => '1909',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/165.png',
                'league' => '78',
            ],
            [
                'team_id' => '161',
                'name' => 'Vfl Wolfsburg',
                'country' => 'Germany',
                'founded' => '1945',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/161.png',
                'league' => '78',
            ],
            [
                'team_id' => '167',
                'name' => '1899 Hoffengeim',
                'country' => 'Germany',
                'founded' => '1899',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/167.png',
                'league' => '78',
            ],
            [
                'team_id' => '33',
                'name' => 'Manchester United',
                'country' => 'England',
                'founded' => '1878',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/33.png',
                'league' => '39',
            ],
            [
                'team_id' => '49',
                'name' => 'Chelsea',
                'country' => 'England',
                'founded' => '1905',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/49.png',
                'league' => '39',
            ],
            [
                'team_id' => '536',
                'name' => 'Sevilla',
                'country' => 'Spain',
                'founded' => '1890',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/536.png',
                'league' => '140',
            ],
            [
                'team_id' => '162',
                'name' => 'Werder Bremen',
                'country' => 'Germany',
                'founded' => '1899',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/162.png',
                'league' => '79',
            ],
            [
                'team_id' => '228',
                'name' => 'Sporting CP',
                'country' => 'Portugal',
                'founded' => '1906',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/228.png',
                'league' => '94',
            ],
            [
                'team_id' => '554',
                'name' => 'Anderlecht',
                'country' => 'Belgium',
                'founded' => '1908',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/554.png',
                'league' => '144',
            ],
            [
                'team_id' => '533',
                'name' => 'Villarreal',
                'country' => 'Spain',
                'founded' => '1923',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/533.png',
                'league' => '140',
            ],
            [
                'team_id' => '197',
                'name' => 'PSV Eindhoven',
                'country' => 'Netherlands',
                'founded' => '1913',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/197.png',
                'league' => '88',
            ],
            [
                'team_id' => '211',
                'name' => 'Benfica',
                'country' => 'Germany',
                'founded' => '1904',
                'national' => '0',
                'logo' => 'https://media.api-sports.io/football/teams/211.png',
                'league' => '94',
            ],
        ];
        DB::table('teams')->insert(
            $teams
        );
    }
}

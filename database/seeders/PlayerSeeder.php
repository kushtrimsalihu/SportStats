<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = [
            [
                'player_id' => '12',
                'photo' => 'https://media.api-sports.io/football/players/12.png',
                'firstname' => 'Omer',
                'lastname' => 'Toprak',
                'age' => '32',
                'height' => '186',
                'nationality' => 'Turkey',
                'place' => 'Turkey',
                'position' => 'Defender',
                'teams' => '162'
            ],
            [
                'player_id' => '14',
                'photo' => 'https://media.api-sports.io/football/players/14.png',
                'firstname' => 'Mahmoud',
                'lastname' => 'Dahoud',
                'age' => '25',
                'height' => '178',
                'nationality' => 'Gernamy',
                'place' => 'Gernamy',
                'position' => 'Midfielder',
                'teams' => '165'
            ],
            [
                'player_id' => '15',
                'photo' => 'https://media.api-sports.io/football/players/15.png',
                'firstname' => 'Thomas Joseph',
                'lastname' => 'Delaney',
                'age' => '30',
                'height' => '182',
                'nationality' => 'Denmark',
                'place' => 'Denmark',
                'position' => 'Midfielder',
                'teams' => '536'
            ],
            [
                'player_id' => '16',
                'photo' => 'https://media.api-sports.io/football/players/16.png',
                'firstname' => 'Mario',
                'lastname' => 'Gotze',
                'age' => '29',
                'height' => '176',
                'nationality' => 'Germany',
                'place' => 'Germany',
                'position' => 'Midfielder',
                'teams' => '197'
            ],
            [
                'player_id' => '17',
                'photo' => 'https://media.api-sports.io/football/players/17.png',
                'firstname' => 'Christian',
                'lastname' => 'Pulisic',
                'age' => '23',
                'height' => '172',
                'nationality' => 'USA',
                'place' => 'USA',
                'position' => 'Midfielder',
                'teams' => '49'
            ],
            [
                'player_id' => '18',
                'photo' => 'https://media.api-sports.io/football/players/18.png',
                'firstname' => 'Jadon',
                'lastname' => 'Sancho',
                'age' => '21',
                'height' => '180',
                'nationality' => 'England',
                'place' => 'England',
                'position' => 'Attacker',
                'teams' => '33'
            ],
            [
                'player_id' => '19',
                'photo' => 'https://media.api-sports.io/football/players/19.png',
                'firstname' => 'Julian',
                'lastname' => 'Weigl',
                'age' => '26',
                'height' => '186',
                'nationality' => 'Germany',
                'place' => 'Germany',
                'position' => 'Midfielder',
                'teams' => '211'
            ],
            [
                'player_id' => '20',
                'photo' => 'https://media.api-sports.io/football/players/20.png',
                'firstname' => 'Axel Laurent Angel',
                'lastname' => 'Lambert Witsel',
                'age' => '32',
                'height' => '186',
                'nationality' => 'Belgium',
                'place' => 'Belgium',
                'position' => 'Midfielder',
                'teams' => '165'
            ],
            [
                'player_id' => '21',
                'photo' => 'https://media.api-sports.io/football/players/21.png',
                'firstname' => 'Francisco',
                'lastname' => 'Alcacer Garcia',
                'age' => '28',
                'height' => '175',
                'nationality' => 'Spain',
                'place' => 'Spain',
                'position' => 'Midfielder',
                'teams' => '533'
            ],
            [
                'player_id' => '22',
                'photo' => 'https://media.api-sports.io/football/players/22.png',
                'firstname' => 'Jacob',
                'lastname' => 'Bruun Larsen',
                'age' => '23',
                'height' => '183',
                'nationality' => 'Denmark',
                'place' => 'Denmark',
                'position' => 'Midfielder',
                'teams' => '167'
            ],
            [
                'player_id' => '23',
                'photo' => 'https://media.api-sports.io/football/players/23.png',
                'firstname' => 'Sergio',
                'lastname' => 'Gomez Martin',
                'age' => '21',
                'height' => '171',
                'nationality' => 'Spain',
                'place' => 'Spain',
                'position' => 'Midfielder',
                'teams' => '554'
            ],
            [
                'player_id' => '24',
                'photo' => 'https://media.api-sports.io/football/players/24.png',
                'firstname' => 'Maximilian',
                'lastname' => 'Philipp',
                'age' => '27',
                'height' => '183',
                'nationality' => 'Germany',
                'place' => 'Germany',
                'position' => 'Midfielder',
                'teams' => '161'
            ],
            [
                'player_id' => '25',
                'photo' => 'https://media.api-sports.io/football/players/25.png',
                'firstname' => 'Marco',
                'lastname' => 'Reus',
                'age' => '32',
                'height' => '186',
                'nationality' => 'Germany',
                'place' => 'Germany',
                'position' => 'Attacker',
                'teams' => '165'
            ],
            [
                'player_id' => '26',
                'photo' => 'https://media.api-sports.io/football/players/26.png',
                'firstname' => 'Marius',
                'lastname' => 'Wolf',
                'age' => '26',
                'height' => '188',
                'nationality' => 'Germany',
                'place' => 'Germany',
                'position' => 'Defender',
                'teams' => '165'
            ],
            [
                'player_id' => '27',
                'photo' => 'https://media.api-sports.io/football/players/27.png',
                'firstname' => 'Antonio',
                'lastname' => 'Adan Gorrido',
                'age' => '34',
                'height' => '190',
                'nationality' => 'Spain',
                'place' => 'Spain',
                'position' => 'Midfielder',
                'teams' => '228'
            ],
        ];
        DB::table('players')->insert(
            $players
        );
    }
}

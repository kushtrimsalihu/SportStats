<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;
use App\Domains\Auth\Models\Players;

class AddPlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:add_players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add players to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $playersid= array(184,157,154,56,59,48,49,50,144,172,32,128,133,136,257,29,127,159,280,497);
        foreach ($playersid as $value) {
            $response = Http::withHeaders([
                        'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                        'x-rapidapi-key' => env('API_KEY')
            ])
                ->get('https://api-football-beta.p.rapidapi.com/players?id='.$value.'&season=2021')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'][0];
            if (count($array) > 1) {
                if (Players::find($array['player']['id'])) {
                    continue;
                } else {
                    DB::table('players')
                        ->insert(
                            [
                                'player_id' => $array['player']['id'],
                                'photo' => $array['player']['photo'],
                                'firstname' => $array['player']['firstname'],
                                'lastname' => $array['player']['lastname'],
                                'age' => $array['player']['age'],
                                'height' => $array['player']['height'],
                                'nationality' => $array['player']['nationality'],
                                'place' => $array['player']['birth']['place'],
                                'position' => $array['statistics'][0]['games']['position'],
                                'teams' => $array['statistics'][0]['team']['id']
                            ]
                    );
                }
            }
            $this->info('The player data added successfully');
        }
    }
}
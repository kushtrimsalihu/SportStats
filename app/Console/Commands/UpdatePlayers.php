<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;
use App\Domains\Auth\Models\Players;

class UpdatePlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Players';

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
        $players = DB::table('players')
            ->select('player_id')
            ->get();
        $playersid = json_decode(json_encode($players), true);
        foreach ($playersid as $value) {
            $response = Http::withHeaders([
                        'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                        'x-rapidapi-key' => env('API_KEY')
            ])
                ->get('https://api-football-beta.p.rapidapi.com/players?id='.$value['player_id'].'&season=2021')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'][0];
            if (count($array) > 1) {
                DB::update('update players set player_id = ?, photo = ?, firstname = ?, lastname = ?,
                            age = ?, height = ?, nationality = ?, place = ?, teams = ?, position = ?
                            where player_id = ?',
                            [
                                $array['player']['id'],
                                $array['player']['photo'],
                                $array['player']['firstname'],
                                $array['player']['lastname'],
                                $array['player']['age'],
                                $array['player']['height'],
                                $array['player']['nationality'],
                                $array['player']['birth']['place'],
                                $array['statistics'][0]['team']['id'],
                                $array['statistics'][0]['games']['position'],
                                $array['player']['id']
                            ]);
            }
            $this->info('The players data added successfully');
        }
    }
}

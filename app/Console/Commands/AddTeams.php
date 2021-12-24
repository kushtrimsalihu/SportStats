<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;
use App\Domains\Auth\Models\Teams;

class AddTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:add_teams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add teams to database';

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

        // DB::table('teams')->delete();
        // $league=DB::table('league')
        // ->select('id')
        // ->get()
        // ->toArray();
        DB::table('teams')->delete();
        $leagueid = array('39','61','78','135','140');
        foreach ($leagueid as $value){
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                'x-rapidapi-key' => env('API_KEY')
                ])
                ->get('https://api-football-beta.p.rapidapi.com/teams?league='.$value.'&season=2021')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'];
            if (isset($array)) {
                foreach ($array as $item) {
                if (Teams::find($item['team']['id'])) {
                    $this->info('Failed to add data');
                }
                else {
                    DB::table('teams')
                    ->insert(
                        [
                            'team_id' => $item['team']['id'],
                            'name' => $item['team']['name'],
                            'country' => $item['team']['country'],
                            'founded' => $item['team']['founded'],
                            'national' => $item['team']['national'],
                            'logo' => $item['team']['logo'],
                            'league' => $value
                            ]
                        );
                    }
                }
            $this->info('Data added successfully');
            }
            else{
                $this->info('Failed to add data');
            }
        }
    }
}




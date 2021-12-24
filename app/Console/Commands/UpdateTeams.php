<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;

class UpdateTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_teams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Teams';

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
        $leagueid = array('39');
        foreach ($leagueid as $value){
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                'x-rapidapi-key' =>env('API_KEY')
                ])
                ->get('https://api-football-beta.p.rapidapi.com/teams?league='.$value.'&season=2021')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'];
            if (isset($array)) {
                foreach ($array as $item) {
                    DB::update('update teams
                    set name = ?,country=?,founded=?,national=?,logo=?,league=?
                    where  team_id = ?',
                    [$item['team']['name'],
                     $item['team']['country'],
                     $item['team']['founded'],
                     $item['team']['national'],
                     $item['team']['logo'],
                     $value,
                     $item['team']['id']]);
                }
            $this->info('Data added successfully');
            }
            else{
                $this->info('Failed to add data');
            }
        }
    }
}

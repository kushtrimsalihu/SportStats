<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;
use App\Domains\Auth\Models\Livescore;

class AddLivescore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:add_livescore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add livescore to database';

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
        DB::table('livescore')->delete();
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'livescore6.p.rapidapi.com',
            'x-rapidapi-key' => env('API_KEY')
        ])
        ->get('https://livescore6.p.rapidapi.com/matches/v2/list-live?Category=soccer')
        ->throw();
        $data = json_decode($response->getBody(), true);
        $array = $data["Stages"];
        // dd($array);
        if (count($array) >= 1) { 
            foreach ($array as $item) {
                
                if (Livescore::find($item['Sid'])) {
                    continue;
                }
                else{
                    $livescore = DB::table('livescore')
                        ->insert(
                            [
                                'id' => $item['Sid'],
                                'league_name_sdn' => $item['Sdn'],
                                'team1_name_nm' => $item['Events'][0]['T1'][0]['Nm'],
                                'team2_name_nm' => $item['Events'][0]['T2'][0]['Nm'],
                                'team1_goal_tr1' => $item['Events'][0]['Tr1'] ?? null,
                                'team2_goal_tr2' => $item['Events'][0]['Tr2'] ?? null,
                                'team1_t1_img' => 'https://lsm-static-prod.livescore.com/medium/'.$item['Events'][0]['T1'][0]['Img'],
                                'team2_t2_img' => 'https://lsm-static-prod.livescore.com/medium/'.$item['Events'][0]['T2'][0]['Img']
                            ]
                        );
                       
                }
            }
            $this->info('Live matches results added successfully');
            return Command::SUCCESS;
        }
        $this->error('Failed to add data');
    }
}

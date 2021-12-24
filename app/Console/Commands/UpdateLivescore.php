<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;
use App\Domains\Auth\Models\Livescore;

class UpdateLivescore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_livescore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Livescore';

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
        // DB::table('livescore')->delete();
        DB::table('livescore')
            ->select('id')
            ->get();
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
                   
                           DB::update('update livescore set id = ?, league_name_sdn = ?, team1_name_nm = ?, team2_name_nm = ?,
                team1_goal_tr1 = ?, team2_goal_tr2 = ?,team1_t1_img=? , team2_t2_img=?
                            where id = ?',
                            [
                                $item['Sid'],
                                $item['Sdn'],
                                $item['Events'][0]['T1'][0]['Nm'],
                                $item['Events'][0]['T2'][0]['Nm'],
                                $item['Events'][0]['Tr1'] ?? null,
                                $item['Events'][0]['Tr2'] ?? null,
                                'https://lsm-static-prod.livescore.com/medium/'.$item['Events'][0]['T1'][0]['Img'],
                                'https://lsm-static-prod.livescore.com/medium/'.$item['Events'][0]['T2'][0]['Img'],
                                $item['Sid']
                            ]);    
                    
                } 
        }
           
        $this->info('The Live Matches data updated successfully');
       
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;
use App\Domains\Auth\Models\League;

class AddLeagues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:add_leagues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add leagues to database';

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
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
            'x-rapidapi-key' => env('API_KEY')
        ])
        ->get('https://api-football-beta.p.rapidapi.com/leagues')
        ->throw();
        $data = json_decode($response->getBody(), true);
        $array = $data['response'];
        if (count($data) > 1) {
            foreach ($array as $item) {
                if (League::find($item['league']['id'])) {
                    continue;
                } else {
                    DB::table('league')
                        ->insert(
                            [
                                'id' => $item['league']['id'],
                                'country' => $item['country']['name'],
                                'name' => $item['league']['name'],
                                'logo' => $item['league']['logo'],
                                'type' => $item['league']['type']
                            ]
                        );
                }
            }
            $this->info('Data added successfully');
            return Command::SUCCESS;
        }
        $this->info('Failed to add data');
    }
}

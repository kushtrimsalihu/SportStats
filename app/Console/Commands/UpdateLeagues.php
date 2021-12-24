<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;

class UpdateLeagues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_leagues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Leagues';

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
        ->get('https://api-football-beta.p.rapidapi.com/leagues');
        $data = json_decode($response->getBody(), true);
        $array = $data['response'];
        if (count($data) > 1) {
            foreach ($array as $item) {
                DB::update('update league
                    set country = ?,name=?,logo=?,type=?
                    where id = ?',
                    [$item['country']['name'],
                    $item['league']['name'],
                    $item['league']['logo'],
                    $item['league']['type'],$item['league']['id']]);
            }
            $this->info('Data updated successfully');
            return Command::SUCCESS;
        }
        $this->info('Failed to update data');
    }
}

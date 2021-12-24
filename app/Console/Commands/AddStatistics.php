<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;

class AddStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:add_statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add statistics to database';

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
        DB::table('statistics')->delete();
        DB::table('rank')->delete();
        $players = DB::table('players')
            ->select('player_id')
            ->where('position', '=', 'Attacker')
            ->get()
            ->toArray();
        $playersid = json_decode(json_encode($players), true);
        foreach ($playersid as $value) {
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                'x-rapidapi-key' => env('API_KEY')
                ])
                ->get('https://api-football-beta.p.rapidapi.com/players?id='.$value['player_id'].'&season=2021')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'];
            if (isset($array[0]['statistics'])) {
                $statistics = $array[0]['statistics'];
                    if (isset($statistics[0]['league']['id'])) {
                        DB::table('statistics')
                        ->insert(
                            [
                                'total_shots' => $statistics[0]['shots']['total'],
                                'on_shots' => $statistics[0]['shots']['on'],
                                'minutes' => $statistics[0]['games']['minutes'],
                                'appearences' => $statistics[0]['games']['appearences'],
                                'total_goals' => $statistics[0]['goals']['total'],
                                'conceded_goals' => $statistics[0]['goals']['conceded'],
                                'assists_goals' => $statistics[0]['goals']['assists'],
                                'saves_goals' => $statistics[0]['goals']['saves'],
                                'total_passes' => $statistics[0]['passes']['total'],
                                'key_passes' => $statistics[0]['passes']['key'],
                                'accuracy_passes' => $statistics[0]['passes']['accuracy'],
                                'total_tackles' => $statistics[0]['tackles']['total'],
                                'blocks_tackles' => $statistics[0]['tackles']['blocks'],
                                'interceptions_tackles' => $statistics[0]['tackles']['interceptions'],
                                'total_duels' => $statistics[0]['duels']['total'],
                                'won_duels' => $statistics[0]['duels']['won'],
                                'attempts_dribbles' => $statistics[0]['dribbles']['attempts'],
                                'success_dribbles' => $statistics[0]['dribbles']['success'],
                                'past_dribbles' => $statistics[0]['dribbles']['past'],
                                'drawn_fouls' => $statistics[0]['fouls']['drawn'],
                                'committed_fouls' => $statistics[0]['fouls']['committed'],
                                'yellow_cards' => $statistics[0]['cards']['yellow'],
                                'red_cards' => $statistics[0]['cards']['red'],
                                'won_penalty' => $statistics[0]['penalty']['won'],
                                'commited_penalty' => $statistics[0]['penalty']['commited'],
                                'scored_penalty' => $statistics[0]['penalty']['scored'],
                                'missed_penalty' => $statistics[0]['penalty']['missed'],
                                'saved_penalty' => $statistics[0]['penalty']['saved'],
                                'score' => (($statistics[0]['shots']['on']/35)*5+($statistics[0]['games']['minutes']/3420)*5+($statistics[0]['games']['appearences']/38)*5+($statistics[0]['goals']['total']/25)*25+($statistics[0]['goals']['conceded']/72)*10+($statistics[0]['goals']['assists']/10)*5+($statistics[0]['goals']['saves']/166)*1+($statistics[0]['passes']['total']/2800)*5+($statistics[0]['passes']['key']/95)*5+($statistics[0]['passes']['accuracy']/2542)*5+($statistics[0]['tackles']['total']/110)*1+($statistics[0]['tackles']['interceptions']/40)*1+($statistics[0]['duels']['won']/264)*2+($statistics[0]['dribbles']['attempts']/216)*3+($statistics[0]['dribbles']['success']/153)*4+($statistics[0]['fouls']['committed']/69)*2+($statistics[0]['penalty']['won']/5)*4+($statistics[0]['penalty']['scored']/10)*2-($statistics[0]['penalty']['missed']/5)*3+($statistics[0]['penalty']['saved']/22)*1-($statistics[0]['cards']['yellow']/12)*3-($statistics[0]['cards']['red']/4)*3),
                                'league' => $statistics[0]['league']['id'],
                                'player' => $array[0]['player']['id']
                            ]
                           
                            );
                            // DB::table('old_table_statistics')
                            // ->insert(
                            //     [   
                            //         'old_score' => (($statistics[0]['shots']['on']/35)*5+($statistics[0]['games']['minutes']/3420)*5+($statistics[0]['games']['appearences']/38)*5+($statistics[0]['goals']['total']/25)*25+($statistics[0]['goals']['conceded']/72)*10+($statistics[0]['goals']['assists']/10)*5+($statistics[0]['goals']['saves']/166)*1+($statistics[0]['passes']['total']/2800)*5+($statistics[0]['passes']['key']/95)*5+($statistics[0]['passes']['accuracy']/2542)*5+($statistics[0]['tackles']['total']/110)*1+($statistics[0]['tackles']['interceptions']/40)*1+($statistics[0]['duels']['won']/264)*2+($statistics[0]['dribbles']['attempts']/216)*3+($statistics[0]['dribbles']['success']/153)*4+($statistics[0]['fouls']['committed']/69)*2+($statistics[0]['penalty']['won']/5)*4+($statistics[0]['penalty']['scored']/10)*2-($statistics[0]['penalty']['missed']/5)*3+($statistics[0]['penalty']['saved']/22)*1-($statistics[0]['cards']['yellow']/12)*3-($statistics[0]['cards']['red']/4)*3),
                            //         'old_league' => $statistics[0]['league']['id'],
                            //         'old_player' => $array[0]['player']['id']
                            //     ]);
                    }
                $this->info('Data added successfully');
            }
            else {
                $this->info('Failed to add data');
            }
        }
       
        $players = DB::table('players')
            ->select('player_id')
            ->where('position', '=', 'Midfielder')
            ->get()
            ->toArray();
        $playersid = json_decode(json_encode($players), true);
        foreach ($playersid as $value) {
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                'x-rapidapi-key' => env('API_KEY')
                ])
                ->get('https://api-football-beta.p.rapidapi.com/players?id='.$value['player_id'].'&season=2021')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'];
            if (isset($array[0]['statistics'])) {
                $statistics = $array[0]['statistics'];
                    if (isset($statistics[0]['league']['id'])) {
                        DB::table('statistics')
                        ->insert(
                            [
                                'total_shots' => $statistics[0]['shots']['total'],
                                'on_shots' => $statistics[0]['shots']['on'],
                                'minutes' => $statistics[0]['games']['minutes'],
                                'appearences' => $statistics[0]['games']['appearences'],
                                'total_goals' => $statistics[0]['goals']['total'],
                                'conceded_goals' => $statistics[0]['goals']['conceded'],
                                'assists_goals' => $statistics[0]['goals']['assists'],
                                'saves_goals' => $statistics[0]['goals']['saves'],
                                'total_passes' => $statistics[0]['passes']['total'],
                                'key_passes' => $statistics[0]['passes']['key'],
                                'accuracy_passes' => $statistics[0]['passes']['accuracy'],
                                'total_tackles' => $statistics[0]['tackles']['total'],
                                'blocks_tackles' => $statistics[0]['tackles']['blocks'],
                                'interceptions_tackles' => $statistics[0]['tackles']['interceptions'],
                                'total_duels' => $statistics[0]['duels']['total'],
                                'won_duels' => $statistics[0]['duels']['won'],
                                'attempts_dribbles' => $statistics[0]['dribbles']['attempts'],
                                'success_dribbles' => $statistics[0]['dribbles']['success'],
                                'past_dribbles' => $statistics[0]['dribbles']['past'],
                                'drawn_fouls' => $statistics[0]['fouls']['drawn'],
                                'committed_fouls' => $statistics[0]['fouls']['committed'],
                                'yellow_cards' => $statistics[0]['cards']['yellow'],
                                'red_cards' => $statistics[0]['cards']['red'],
                                'won_penalty' => $statistics[0]['penalty']['won'],
                                'commited_penalty' => $statistics[0]['penalty']['commited'],
                                'scored_penalty' => $statistics[0]['penalty']['scored'],
                                'missed_penalty' => $statistics[0]['penalty']['missed'],
                                'saved_penalty' => $statistics[0]['penalty']['saved'],
                                'score' => (($statistics[0]['shots']['on']/35)*5+($statistics[0]['games']['minutes']/3420)*5+($statistics[0]['games']['appearences']/38)*5+($statistics[0]['goals']['total']/25)*10+($statistics[0]['goals']['conceded']/72)*5+($statistics[0]['goals']['assists']/10)*5+($statistics[0]['goals']['saves']/166)*1+($statistics[0]['passes']['total']/2800)*10+($statistics[0]['passes']['key']/95)*10+($statistics[0]['passes']['accuracy']/2542)*10+($statistics[0]['tackles']['total']/110)*5+($statistics[0]['tackles']['interceptions']/40)*1+($statistics[0]['duels']['won']/264)*5+($statistics[0]['dribbles']['attempts']/216)*3+($statistics[0]['dribbles']['success']/153)*4+($statistics[0]['fouls']['committed']/69)*3+($statistics[0]['penalty']['won']/5)*2+($statistics[0]['penalty']['scored']/10)*1-($statistics[0]['penalty']['missed']/5)*3+($statistics[0]['penalty']['saved']/22)*1-($statistics[0]['cards']['yellow']/12)*3-($statistics[0]['cards']['red']/4)*3),
                                'league' => $statistics[0]['league']['id'],
                                'player' => $array[0]['player']['id']
                            ]
                           
                            );
                            // DB::table('old_table_statistics')
                            // ->insert(
                            //     [   
                            //         'old_score' => (($statistics[0]['shots']['on']/35)*5+($statistics[0]['games']['minutes']/3420)*5+($statistics[0]['games']['appearences']/38)*5+($statistics[0]['goals']['total']/25)*10+($statistics[0]['goals']['conceded']/72)*5+($statistics[0]['goals']['assists']/10)*5+($statistics[0]['goals']['saves']/166)*1+($statistics[0]['passes']['total']/2800)*10+($statistics[0]['passes']['key']/95)*10+($statistics[0]['passes']['accuracy']/2542)*10+($statistics[0]['tackles']['total']/110)*5+($statistics[0]['tackles']['interceptions']/40)*1+($statistics[0]['duels']['won']/264)*5+($statistics[0]['dribbles']['attempts']/216)*3+($statistics[0]['dribbles']['success']/153)*4+($statistics[0]['fouls']['committed']/69)*3+($statistics[0]['penalty']['won']/5)*2+($statistics[0]['penalty']['scored']/10)*1-($statistics[0]['penalty']['missed']/5)*3+($statistics[0]['penalty']['saved']/22)*1-($statistics[0]['cards']['yellow']/12)*3-($statistics[0]['cards']['red']/4)*3),
                            //         'old_league' => $statistics[0]['league']['id'],
                            //         'old_player' => $array[0]['player']['id']
                            //     ]);
                    }
            }

        }
        $players = DB::table('players')
            ->select('player_id')
            ->where('position', '=', 'Defender')
            ->get()
            ->toArray();
        $playersid = json_decode(json_encode($players), true);
        foreach ($playersid as $value) {
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                'x-rapidapi-key' => env('API_KEY')
                ])
                ->get('https://api-football-beta.p.rapidapi.com/players?id='.$value['player_id'].'&season=2021')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'];
            if (isset($array[0]['statistics'])) {
                $statistics = $array[0]['statistics'];
                    if (isset($statistics[0]['league']['id'])) {
                        DB::table('statistics')
                        ->insert(
                            [
                                'total_shots' => $statistics[0]['shots']['total'],
                                'on_shots' => $statistics[0]['shots']['on'],
                                'minutes' => $statistics[0]['games']['minutes'],
                                'appearences' => $statistics[0]['games']['appearences'],
                                'total_goals' => $statistics[0]['goals']['total'],
                                'conceded_goals' => $statistics[0]['goals']['conceded'],
                                'assists_goals' => $statistics[0]['goals']['assists'],
                                'saves_goals' => $statistics[0]['goals']['saves'],
                                'total_passes' => $statistics[0]['passes']['total'],
                                'key_passes' => $statistics[0]['passes']['key'],
                                'accuracy_passes' => $statistics[0]['passes']['accuracy'],
                                'total_tackles' => $statistics[0]['tackles']['total'],
                                'blocks_tackles' => $statistics[0]['tackles']['blocks'],
                                'interceptions_tackles' => $statistics[0]['tackles']['interceptions'],
                                'total_duels' => $statistics[0]['duels']['total'],
                                'won_duels' => $statistics[0]['duels']['won'],
                                'attempts_dribbles' => $statistics[0]['dribbles']['attempts'],
                                'success_dribbles' => $statistics[0]['dribbles']['success'],
                                'past_dribbles' => $statistics[0]['dribbles']['past'],
                                'drawn_fouls' => $statistics[0]['fouls']['drawn'],
                                'committed_fouls' => $statistics[0]['fouls']['committed'],
                                'yellow_cards' => $statistics[0]['cards']['yellow'],
                                'red_cards' => $statistics[0]['cards']['red'],
                                'won_penalty' => $statistics[0]['penalty']['won'],
                                'commited_penalty' => $statistics[0]['penalty']['commited'],
                                'scored_penalty' => $statistics[0]['penalty']['scored'],
                                'missed_penalty' => $statistics[0]['penalty']['missed'],
                                'saved_penalty' => $statistics[0]['penalty']['saved'],
                                'score' => (($statistics[0]['shots']['on']/35)*1+($statistics[0]['games']['minutes']/3420)*5+($statistics[0]['games']['appearences']/38)*5+($statistics[0]['goals']['total']/25)*1+($statistics[0]['goals']['conceded']/72)*1+($statistics[0]['goals']['assists']/10)*1+($statistics[0]['goals']['saves']/166)*1+($statistics[0]['passes']['total']/2800)*10+($statistics[0]['passes']['key']/95)*5+($statistics[0]['passes']['accuracy']/2542)*5+($statistics[0]['tackles']['total']/110)*25+($statistics[0]['tackles']['interceptions']/40)*10+($statistics[0]['duels']['won']/264)*9+($statistics[0]['dribbles']['attempts']/216)*2+($statistics[0]['dribbles']['success']/153)*3+($statistics[0]['fouls']['committed']/69)*3+($statistics[0]['penalty']['won']/5)*1+($statistics[0]['penalty']['scored']/10)*2-($statistics[0]['penalty']['missed']/5)*3+($statistics[0]['penalty']['saved']/22)*3-($statistics[0]['cards']['yellow']/12)*3-($statistics[0]['cards']['red']/4)*3),
                                'league' => $statistics[0]['league']['id'],
                                'player' => $array[0]['player']['id']
                            ]
                           
                            );
                            // DB::table('old_table_statistics')
                            // ->insert(
                            //     [   
                            //         'old_score' => (($statistics[0]['shots']['on']/35)*1+($statistics[0]['games']['minutes']/3420)*5+($statistics[0]['games']['appearences']/38)*5+($statistics[0]['goals']['total']/25)*1+($statistics[0]['goals']['conceded']/72)*1+($statistics[0]['goals']['assists']/10)*1+($statistics[0]['goals']['saves']/166)*1+($statistics[0]['passes']['total']/2800)*10+($statistics[0]['passes']['key']/95)*5+($statistics[0]['passes']['accuracy']/2542)*5+($statistics[0]['tackles']['total']/110)*25+($statistics[0]['tackles']['interceptions']/40)*10+($statistics[0]['duels']['won']/264)*9+($statistics[0]['dribbles']['attempts']/216)*2+($statistics[0]['dribbles']['success']/153)*3+($statistics[0]['fouls']['committed']/69)*3+($statistics[0]['penalty']['won']/5)*1+($statistics[0]['penalty']['scored']/10)*2-($statistics[0]['penalty']['missed']/5)*3+($statistics[0]['penalty']['saved']/22)*3-($statistics[0]['cards']['yellow']/12)*3-($statistics[0]['cards']['red']/4)*3),
                            //         'old_league' => $statistics[0]['league']['id'],
                            //         'old_player' => $array[0]['player']['id']
                            //     ]);
                    }
            }

        }
        $players = DB::table('players')
            ->select('player_id')
            ->where('position', '=', 'Goalkeeper')
            ->get()
            ->toArray();
        $playersid = json_decode(json_encode($players), true);
        foreach ($playersid as $value) {
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                'x-rapidapi-key' => env('API_KEY')
                ])
                ->get('https://api-football-beta.p.rapidapi.com/players?id='.$value['player_id'].'&season=2021')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'];
            if (isset($array[0]['statistics'])) {
                $statistics = $array[0]['statistics'];
                    if (isset($statistics[0]['league']['id'])) {
                        DB::table('statistics')
                        ->insert(
                            [
                                'total_shots' => $statistics[0]['shots']['total'],
                                'on_shots' => $statistics[0]['shots']['on'],
                                'minutes' => $statistics[0]['games']['minutes'],
                                'appearences' => $statistics[0]['games']['appearences'],
                                'total_goals' => $statistics[0]['goals']['total'],
                                'conceded_goals' => $statistics[0]['goals']['conceded'],
                                'assists_goals' => $statistics[0]['goals']['assists'],
                                'saves_goals' => $statistics[0]['goals']['saves'],
                                'total_passes' => $statistics[0]['passes']['total'],
                                'key_passes' => $statistics[0]['passes']['key'],
                                'accuracy_passes' => $statistics[0]['passes']['accuracy'],
                                'total_tackles' => $statistics[0]['tackles']['total'],
                                'blocks_tackles' => $statistics[0]['tackles']['blocks'],
                                'interceptions_tackles' => $statistics[0]['tackles']['interceptions'],
                                'total_duels' => $statistics[0]['duels']['total'],
                                'won_duels' => $statistics[0]['duels']['won'],
                                'attempts_dribbles' => $statistics[0]['dribbles']['attempts'],
                                'success_dribbles' => $statistics[0]['dribbles']['success'],
                                'past_dribbles' => $statistics[0]['dribbles']['past'],
                                'drawn_fouls' => $statistics[0]['fouls']['drawn'],
                                'committed_fouls' => $statistics[0]['fouls']['committed'],
                                'yellow_cards' => $statistics[0]['cards']['yellow'],
                                'red_cards' => $statistics[0]['cards']['red'],
                                'won_penalty' => $statistics[0]['penalty']['won'],
                                'commited_penalty' => $statistics[0]['penalty']['commited'],
                                'scored_penalty' => $statistics[0]['penalty']['scored'],
                                'missed_penalty' => $statistics[0]['penalty']['missed'],
                                'saved_penalty' => $statistics[0]['penalty']['saved'],
                                'score' => (($statistics[0]['shots']['on']/35)*1+($statistics[0]['games']['minutes']/3420)*5+($statistics[0]['games']['appearences']/38)*5+($statistics[0]['goals']['total']/25)*1+($statistics[0]['goals']['conceded']/72)*1+($statistics[0]['goals']['assists']/10)*1+($statistics[0]['goals']['saves']/166)*40+($statistics[0]['passes']['total']/2800)*1+($statistics[0]['passes']['key']/95)*10+($statistics[0]['passes']['accuracy']/2542)*10+($statistics[0]['tackles']['total']/110)*1+($statistics[0]['tackles']['interceptions']/40)*1+($statistics[0]['duels']['won']/264)*1+($statistics[0]['dribbles']['attempts']/216)*1+($statistics[0]['dribbles']['success']/153)*1+($statistics[0]['fouls']['committed']/69)*1+($statistics[0]['penalty']['won']/5)*1+($statistics[0]['penalty']['scored']/10)*2-($statistics[0]['penalty']['missed']/5)*1+($statistics[0]['penalty']['saved']/22)*1-($statistics[0]['cards']['yellow']/12)*10-($statistics[0]['cards']['red']/4)*10),
                                'league' => $statistics[0]['league']['id'],
                                'player' => $array[0]['player']['id']
                            ]
                           
                            );
                            // DB::table('old_table_statistics')
                            // ->insert(
                            //     [   
                            //         'old_score' => (($statistics[0]['shots']['on']/35)*1+($statistics[0]['games']['minutes']/3420)*5+($statistics[0]['games']['appearences']/38)*5+($statistics[0]['goals']['total']/25)*1+($statistics[0]['goals']['conceded']/72)*1+($statistics[0]['goals']['assists']/10)*1+($statistics[0]['goals']['saves']/166)*40+($statistics[0]['passes']['total']/2800)*1+($statistics[0]['passes']['key']/95)*10+($statistics[0]['passes']['accuracy']/2542)*10+($statistics[0]['tackles']['total']/110)*1+($statistics[0]['tackles']['interceptions']/40)*1+($statistics[0]['duels']['won']/264)*1+($statistics[0]['dribbles']['attempts']/216)*1+($statistics[0]['dribbles']['success']/153)*1+($statistics[0]['fouls']['committed']/69)*1+($statistics[0]['penalty']['won']/5)*1+($statistics[0]['penalty']['scored']/10)*2-($statistics[0]['penalty']['missed']/5)*1+($statistics[0]['penalty']['saved']/22)*1-($statistics[0]['cards']['yellow']/12)*10-($statistics[0]['cards']['red']/4)*10),
                            //         'old_league' => $statistics[0]['league']['id'],
                            //         'old_player' => $array[0]['player']['id']
                            //     ]);
                    }
            }

        }
        DB::table('rank')->delete();
        $rank= DB::table('statistics')
        ->join('players', 'player', '=', 'players.player_id')
        ->where('position', '=', 'Attacker')
        ->orderBy('score', 'desc')
        ->get()
        ->toArray();
        $rankss = json_decode(json_encode($rank), true);
        $i=1;
        foreach($rankss  as $ranks)
            { 
                DB::table('rank')
                ->insert(
                    [                      
                        'rank' => $i++,
                        'player_rank_id' => $ranks['player']
                       
                    ]);
            }

        $rank= DB::table('statistics')
        ->join('players', 'player', '=', 'players.player_id')
        ->where('position', '=', 'Midfielder')
        ->orderBy('score', 'desc')
        ->get()
        ->toArray();
        $rankss = json_decode(json_encode($rank), true);
        $b=1;
        foreach($rankss  as $ranks)
            { 
                DB::table('rank')
                ->insert(
                    [                      
                        'rank' => $b++,
                        'player_rank_id' => $ranks['player']
                        
                    ]);
            }

        $rank= DB::table('statistics')
        ->join('players', 'player', '=', 'players.player_id')
        ->where('position', '=', 'Defender')
        ->orderBy('score', 'desc')
        ->get()
        ->toArray();
        $rankss = json_decode(json_encode($rank), true);
        $c=1;
        foreach($rankss  as $ranks)
            { 
                DB::table('rank')
                ->insert(
                    [                      
                        'rank' => $c++,
                        'player_rank_id' => $ranks['player']
                        
                    ]);
            }

            $rank= DB::table('statistics')
        ->join('players', 'player', '=', 'players.player_id')
        ->where('position', '=', 'Goalkeeper')
        ->orderBy('score', 'desc')
        ->get()
        ->toArray();
        $rankss = json_decode(json_encode($rank), true);
        $d=1;
        foreach($rankss  as $ranks)
            { 
                DB::table('rank')
                ->insert(
                    [                      
                        'rank' => $d++,
                        'player_rank_id' => $ranks['player']
                        
                    ]);
            }


        DB::table('old_rank')->delete();
        $old_datas= DB::table('rank')->get()->toArray();
        $old_data_stats = json_decode(json_encode($old_datas), true);
        foreach($old_data_stats  as $old_data)
            {
                DB::table('old_rank')
                ->insert(
                    [                      
                        'old_player_rank_id' => $old_data['player_rank_id'],
                        'old_rank' => $old_data['rank'],
                    ]);
            }

    }
}

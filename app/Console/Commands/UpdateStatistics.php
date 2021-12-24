<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;

class UpdateStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Player Statistics';

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


        // here----------------------------------------------
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

        $players = DB::table('players')
            ->select('player_id')
            ->where('position', '=', 'Attacker')
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
            $array = $data['response'];
            if (isset($array[0]['statistics'])) {
                $statistics = $array[0]['statistics'];
                foreach ($statistics as $item) {
                    $score = (($item['shots']['on']/35)*5+($item['games']['minutes']/3420)*5+($item['games']['appearences']/38)*5+($item['goals']['total']/25)*25+($item['goals']['conceded']/72)*10+($item['goals']['assists']/10)*5+($item['goals']['saves']/166)*1+($item['passes']['total']/2800)*5+($item['passes']['key']/95)*5+($item['passes']['accuracy']/2542)*5+($item['tackles']['total']/110)*1+($item['tackles']['interceptions']/40)*1+($item['duels']['won']/264)*2+($item['dribbles']['attempts']/216)*3+($item['dribbles']['success']/153)*4+($item['fouls']['committed']/69)*2+($item['penalty']['won']/5)*4+($item['penalty']['scored']/10)*2-($item['penalty']['missed']/5)*3+($item['penalty']['saved']/22)*1-($item['cards']['yellow']/12)*3-($item['cards']['red']/4)*3);
                    DB::update('update statistics 
                        set total_shots = ?,on_shots=?,minutes=?,appearences=?,
                        total_goals = ?,conceded_goals=?,assists_goals=?,saves_goals=?,
                        total_passes = ?,key_passes=?,accuracy_passes=?,total_tackles=?,
                        blocks_tackles = ?,interceptions_tackles=?,total_duels=?,won_duels=?,
                        attempts_dribbles = ?,success_dribbles=?,past_dribbles=?,drawn_fouls=?,
                        committed_fouls = ?,yellow_cards=?,red_cards=?,won_penalty=?,
                        commited_penalty = ?,scored_penalty=?,missed_penalty=?,saved_penalty=?,score=?
                        where league=? and player=?',
                        [$item['shots']['total'],
                        $item['shots']['on'],
                        $item['games']['minutes'],
                        $item['games']['appearences'],
                        $item['goals']['total'],
                        $item['goals']['conceded'],
                        $item['goals']['assists'],
                        $item['goals']['saves'],
                        $item['passes']['total'],
                        $item['passes']['key'],
                        $item['passes']['accuracy'],
                        $item['tackles']['total'],
                        $item['tackles']['blocks'],
                        $item['tackles']['interceptions'],
                        $item['duels']['total'],
                        $item['duels']['won'],
                        $item['dribbles']['attempts'],
                        $item['dribbles']['success'],
                        $item['dribbles']['past'],
                        $item['fouls']['drawn'],
                        $item['fouls']['committed'],
                        $item['cards']['yellow'],
                        $item['cards']['red'],
                        $item['penalty']['won'],
                        $item['penalty']['commited'],
                        $item['penalty']['scored'],
                        $item['penalty']['missed'],
                        $item['penalty']['saved'],
                        $score,
                        $item['league']['id'],
                        $value['player_id']
                    ]);
                }
                $this->info('Data updated successfully');
            }
            else {
                $this->info('Failed to update data');
            }
        }

        $players = DB::table('players')
            ->select('player_id')
            ->where('position', '=', 'Midfielder')
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
            $array = $data['response'];
            if (isset($array[0]['statistics'])) {
                $statistics = $array[0]['statistics'];
                foreach ($statistics as $item) {
                    $score2 = (($item['shots']['on']/35)*5+($item['games']['minutes']/3420)*5+($item['games']['appearences']/38)*5+($item['goals']['total']/25)*10+($item['goals']['conceded']/72)*5+($item['goals']['assists']/10)*5+($item['goals']['saves']/166)*1+($item['passes']['total']/2800)*10+($item['passes']['key']/95)*10+($item['passes']['accuracy']/2542)*10+($item['tackles']['total']/110)*5+($item['tackles']['interceptions']/40)*1+($item['duels']['won']/264)*5+($item['dribbles']['attempts']/216)*3+($item['dribbles']['success']/153)*4+($item['fouls']['committed']/69)*3+($item['penalty']['won']/5)*2+($item['penalty']['scored']/10)*1-($item['penalty']['missed']/5)*3+($item['penalty']['saved']/22)*1-($item['cards']['yellow']/12)*3-($item['cards']['red']/4)*3);
                    DB::update('update statistics 
                        set total_shots = ?,on_shots=?,minutes=?,appearences=?,
                        total_goals = ?,conceded_goals=?,assists_goals=?,saves_goals=?,
                        total_passes = ?,key_passes=?,accuracy_passes=?,total_tackles=?,
                        blocks_tackles = ?,interceptions_tackles=?,total_duels=?,won_duels=?,
                        attempts_dribbles = ?,success_dribbles=?,past_dribbles=?,drawn_fouls=?,
                        committed_fouls = ?,yellow_cards=?,red_cards=?,won_penalty=?,
                        commited_penalty = ?,scored_penalty=?,missed_penalty=?,saved_penalty=?,score=?
                        where league=? and player=?',
                        [$item['shots']['total'],
                        $item['shots']['on'],
                        $item['games']['minutes'],
                        $item['games']['appearences'],
                        $item['goals']['total'],
                        $item['goals']['conceded'],
                        $item['goals']['assists'],
                        $item['goals']['saves'],
                        $item['passes']['total'],
                        $item['passes']['key'],
                        $item['passes']['accuracy'],
                        $item['tackles']['total'],
                        $item['tackles']['blocks'],
                        $item['tackles']['interceptions'],
                        $item['duels']['total'],
                        $item['duels']['won'],
                        $item['dribbles']['attempts'],
                        $item['dribbles']['success'],
                        $item['dribbles']['past'],
                        $item['fouls']['drawn'],
                        $item['fouls']['committed'],
                        $item['cards']['yellow'],
                        $item['cards']['red'],
                        $item['penalty']['won'],
                        $item['penalty']['commited'],
                        $item['penalty']['scored'],
                        $item['penalty']['missed'],
                        $item['penalty']['saved'],
                        $score2,
                        $item['league']['id'],
                        $value['player_id']
                    ]);
                }
                $this->info('Data updated successfully');
            }
            else {
                $this->info('Failed to update data');
            }
        }

        
        $players = DB::table('players')
            ->select('player_id')
            ->where('position', '=', 'Defender')
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
            $array = $data['response'];
            if (isset($array[0]['statistics'])) {
                $statistics = $array[0]['statistics'];
                foreach ($statistics as $item) {
                    $score3 = (($item['shots']['on']/35)*1+($item['games']['minutes']/3420)*5+($item['games']['appearences']/38)*5+($item['goals']['total']/25)*1+($item['goals']['conceded']/72)*1+($item['goals']['assists']/10)*1+($item['goals']['saves']/166)*1+($item['passes']['total']/2800)*10+($item['passes']['key']/95)*5+($item['passes']['accuracy']/2542)*5+($item['tackles']['total']/110)*25+($item['tackles']['interceptions']/40)*10+($item['duels']['won']/264)*9+($item['dribbles']['attempts']/216)*2+($item['dribbles']['success']/153)*3+($item['fouls']['committed']/69)*3+($item['penalty']['won']/5)*1+($item['penalty']['scored']/10)*2-($item['penalty']['missed']/5)*3+($item['penalty']['saved']/22)*3-($item['cards']['yellow']/12)*3-($item['cards']['red']/4)*3);
                    DB::update('update statistics 
                        set total_shots = ?,on_shots=?,minutes=?,appearences=?,
                        total_goals = ?,conceded_goals=?,assists_goals=?,saves_goals=?,
                        total_passes = ?,key_passes=?,accuracy_passes=?,total_tackles=?,
                        blocks_tackles = ?,interceptions_tackles=?,total_duels=?,won_duels=?,
                        attempts_dribbles = ?,success_dribbles=?,past_dribbles=?,drawn_fouls=?,
                        committed_fouls = ?,yellow_cards=?,red_cards=?,won_penalty=?,
                        commited_penalty = ?,scored_penalty=?,missed_penalty=?,saved_penalty=?,score=?
                        where league=? and player=?',
                        [$item['shots']['total'],
                        $item['shots']['on'],
                        $item['games']['minutes'],
                        $item['games']['appearences'],
                        $item['goals']['total'],
                        $item['goals']['conceded'],
                        $item['goals']['assists'],
                        $item['goals']['saves'],
                        $item['passes']['total'],
                        $item['passes']['key'],
                        $item['passes']['accuracy'],
                        $item['tackles']['total'],
                        $item['tackles']['blocks'],
                        $item['tackles']['interceptions'],
                        $item['duels']['total'],
                        $item['duels']['won'],
                        $item['dribbles']['attempts'],
                        $item['dribbles']['success'],
                        $item['dribbles']['past'],
                        $item['fouls']['drawn'],
                        $item['fouls']['committed'],
                        $item['cards']['yellow'],
                        $item['cards']['red'],
                        $item['penalty']['won'],
                        $item['penalty']['commited'],
                        $item['penalty']['scored'],
                        $item['penalty']['missed'],
                        $item['penalty']['saved'],
                        $score3,
                        $item['league']['id'],
                        $value['player_id']
                    ]);
                }
                $this->info('Data updated successfully');
            }
            else {
                $this->info('Failed to update data');
            }
        }

        $players = DB::table('players')
            ->select('player_id')
            ->where('position', '=', 'Goalkeeper')
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
            $array = $data['response'];
            if (isset($array[0]['statistics'])) {
                $statistics = $array[0]['statistics'];
                foreach ($statistics as $item) {
                    $score4 = (($item['shots']['on']/35)*1+($item['games']['minutes']/3420)*5+($item['games']['appearences']/38)*5+($item['goals']['total']/25)*1+($item['goals']['conceded']/72)*1+($item['goals']['assists']/10)*1+($item['goals']['saves']/166)*40+($item['passes']['total']/2800)*1+($item['passes']['key']/95)*10+($item['passes']['accuracy']/2542)*10+($item['tackles']['total']/110)*1+($item['tackles']['interceptions']/40)*1+($item['duels']['won']/264)*1+($item['dribbles']['attempts']/216)*1+($item['dribbles']['success']/153)*1+($item['fouls']['committed']/69)*1+($item['penalty']['won']/5)*1+($item['penalty']['scored']/10)*2-($item['penalty']['missed']/5)*1+($item['penalty']['saved']/22)*1-($item['cards']['yellow']/12)*10-($item['cards']['red']/4)*10);
                    DB::update('update statistics 
                        set total_shots = ?,on_shots=?,minutes=?,appearences=?,
                        total_goals = ?,conceded_goals=?,assists_goals=?,saves_goals=?,
                        total_passes = ?,key_passes=?,accuracy_passes=?,total_tackles=?,
                        blocks_tackles = ?,interceptions_tackles=?,total_duels=?,won_duels=?,
                        attempts_dribbles = ?,success_dribbles=?,past_dribbles=?,drawn_fouls=?,
                        committed_fouls = ?,yellow_cards=?,red_cards=?,won_penalty=?,
                        commited_penalty = ?,scored_penalty=?,missed_penalty=?,saved_penalty=?,score=?
                        where league=? and player=?',
                        [$item['shots']['total'],
                        $item['shots']['on'],
                        $item['games']['minutes'],
                        $item['games']['appearences'],
                        $item['goals']['total'],
                        $item['goals']['conceded'],
                        $item['goals']['assists'],
                        $item['goals']['saves'],
                        $item['passes']['total'],
                        $item['passes']['key'],
                        $item['passes']['accuracy'],
                        $item['tackles']['total'],
                        $item['tackles']['blocks'],
                        $item['tackles']['interceptions'],
                        $item['duels']['total'],
                        $item['duels']['won'],
                        $item['dribbles']['attempts'],
                        $item['dribbles']['success'],
                        $item['dribbles']['past'],
                        $item['fouls']['drawn'],
                        $item['fouls']['committed'],
                        $item['cards']['yellow'],
                        $item['cards']['red'],
                        $item['penalty']['won'],
                        $item['penalty']['commited'],
                        $item['penalty']['scored'],
                        $item['penalty']['missed'],
                        $item['penalty']['saved'],
                        $score4,
                        $item['league']['id'],
                        $value['player_id']
                    ]);
                }
                $this->info('Data updated successfully');
            }
            else {
                $this->info('Failed to update data');
            }
        }
        // here-------------------------------------



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
      
    }
} 
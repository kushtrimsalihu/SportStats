<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\Players;
use App\Domains\Auth\Models\Statistics;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Frontend\User;
use Illuminate\Support\Facades\DB;

class ComparePlayersController
{
    public function comparePlayer(Request $request)
    {
        
        $players = DB::table('players')
             ->join('statistics', 'player_id', '=', 'statistics.player')
             ->orderBy('player_id','DESC')
             ->get();
            
        $player1 =  DB::table('players')
            ->join('statistics', 'player_id', '=', 'statistics.player')
            ->where('players.player_id', '=', $request->input('player1'))
            ->get();
        $player2 =  DB::table('players')
            ->join('statistics', 'player_id', '=', 'statistics.player')
            ->where('players.player_id', '=', $request->input('player2'))
            ->get();
            return view('frontend.user.compareplayers')->with([
                'players' => $players,
                'player1' => $player1,
                'player2' => $player2
            ]);
    }
}
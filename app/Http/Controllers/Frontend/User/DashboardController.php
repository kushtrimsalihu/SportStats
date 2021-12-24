<?php

namespace App\Http\Controllers\Frontend\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Domains\Auth\Models\Teams;
use App\Models\Vote;
use Carbon\Carbon;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {   
        $dailyvote = DB::table('dailyvote')->where('created_at', '>=', Carbon::now()->subDay())->latest('created_at')->first();
        if ($dailyvote) {
            $user = Auth::id();
            $voted = Vote::where('user', '=', $user)->where('daily_vote', '=', $dailyvote->id)->first();
            $team1 = Teams::where('teams.team_id', '=', $dailyvote->team1)->first();
            $team2 = Teams::where('teams.team_id', '=', $dailyvote->team2)->first();
            if ($voted) {
                $votedall = count(Vote::where('daily_vote', '=', $dailyvote->id)->get());
                $votedteam1 = count(Vote::where('daily_vote', '=', $dailyvote->id)->where('team', '=', $dailyvote->team1)->get())*100/$votedall;
                $votedteam2 = count(Vote::where('daily_vote', '=', $dailyvote->id)->where('team', '=', $dailyvote->team2)->get())*100/$votedall;
                return view('frontend.user.dashboard')->with([
                    'voted' => true,
                    'votedteam1' => round($votedteam1),
                    'votedteam2' => round($votedteam2),
                    'team1' => $team1,
                    'team2' => $team2
                ]);
            }
            else {
                return view('frontend.user.dashboard')->with([
                    'team1' => $team1,
                    'team2' => $team2
                ]);
            }
        }
        return view('frontend.user.dashboard');
    }

    public function ranking()

    {    
    $LeagueList = DB::table('league')
        ->select('league.*')
        ->get();
    $TeamsList = DB::table('teams')
        ->select('teams.*')
        ->get();
    $topperformances = DB::table('players')
        ->join('statistics', 'player_id', '=', 'statistics.player')
        ->join('rank', 'player_id', '=', 'rank.player_rank_id')
        ->join('old_rank', 'player_id', '=', 'old_rank.old_player_rank_id')
        ->join('league', 'league', '=', 'league.id')
        ->join('teams', 'teams', '=', 'teams.team_id')
        ->orderBy('rank', 'asc')->get();   
    return view('frontend.user.ranking',[
        'leagues' => $LeagueList,
        'teams' => $TeamsList,
        'topperformances' => $topperformances
    ]);
        return view('frontend.user.ranking');
    }

    
    public function filters()

    {    
    $LeagueList = DB::table('league')
        ->select('league.*')
        ->get();
    $TeamsList = DB::table('teams')
        ->select('teams.*')
        ->get();
    $topperformances = DB::table('players')
        ->join('statistics', 'player_id', '=', 'statistics.player')
        ->join('league', 'league', '=', 'league.id')
        ->join('teams', 'teams', '=', 'teams.team_id')
        ->join('rank', 'player_id', '=', 'rank.player_rank_id')
        ->orderBy('total_goals', 'desc')->get();
    
    return view('frontend.user.filters',[
        'leagues' => $LeagueList,
        'teams' => $TeamsList,
        'topperformances' => $topperformances
    ]);

        return view('frontend.user.filters');
    }


    public function show($player_id)
    {
        $PlayerShow = DB::table('players')
            ->join('teams', 'players.teams', '=', 'teams.team_id')
            ->join('rank', 'players.player_id', '=', 'rank.player_rank_id')
            ->select('players.*', 'teams.name', 'teams.logo', 'rank.rank')
            ->where('player_id', '=', $player_id)->first();
        $statistics = DB::table('statistics')
            ->select('statistics.*')
            ->where('player', '=', $player_id)->first();

        $playerposts = DB::table('posts')
            ->join('posttag', 'posts.id', '=', 'posttag.post_id')
            ->join('tag', 'posttag.tag_id', '=', 'tag.id')
            ->whereRaw("? LIKE CONCAT('%', tag.name, '%')", [$PlayerShow->firstname])
            ->orwhereRaw("? LIKE CONCAT('%', tag.name, '%')", [$PlayerShow->lastname])
            ->take(6)
            ->get();

        return view('frontend.user.show',[
            'playershow' => $PlayerShow,
            'statistics' => $statistics,
            'posts' => $playerposts
        ]);

        return view('frontend.user.show');
    }
    
}

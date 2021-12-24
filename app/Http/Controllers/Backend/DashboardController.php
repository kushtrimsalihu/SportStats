<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;

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
        $totalusers = count(DB::table('users')->get());
        $totalleague = count(DB::table('league')->get());
        $totalsports = count(DB::table('sports')->get());
        $totalteams = count(DB::table('teams')->get());
        $totalstatistics = count(DB::table('statistics')->get());
        $totalpositions = count(DB::table('position')->get());
        $totaladmins = count(DB::table('users')->where('type', '=', 'admin')->get());
        $deletedusers = count(DB::table('users')->where('deleted_at', '!=', 'null')->get());
        $deactiviatedusers = count(DB::table('users')->where('active', '!=', '1')->get());
        $newusers = DB::table('users')->where('type', '=', 'user')->orderBy('created_at', 'desc')->take(8)->get();
        $totalplayers = count(DB::table('players')->get());
        $topperformances = DB::table('players')
                        ->join('statistics', 'player_id', '=', 'statistics.player')
                        ->join('league', 'league', '=', 'league.id')
                        ->orderBy('total_goals', 'desc')->take(8)->get();
        return view('backend.dashboard',[
            'totalusers' => $totalusers,
            'totaladmins' => $totaladmins,
            'topperformances' => $topperformances,
            'totalplayers' => $totalplayers,
            'newusers' => $newusers,
            'deletedusers' => $deletedusers,
            'deactiviatedusers' => $deactiviatedusers,
            'totalleague' => $totalleague,
            'totalsports' => $totalsports,
            'totalteams' => $totalteams,
            'totalpositions' => $totalpositions,
            'totalstatistics' => $totalstatistics
        ]);
    }
}
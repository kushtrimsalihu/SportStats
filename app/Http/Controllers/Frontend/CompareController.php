<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\Teams;
use Illuminate\Support\Facades\Http;

class CompareController
{
    public function index()
    {
        $teams = Teams::all();
        if (count($teams) > 0) {
            return view('frontend.pages.comparisons.compareteams')->with('teams', $teams);
        }
        return view('frontend.user.dashboard');
    }
    
    public function apicall(Request $request)
    {
        $team1 = Teams::find($request->input('team1'));
        $team2 = Teams::find($request->input('team2'));
        $response1 = Http::withHeaders([
            'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
            'x-rapidapi-key' => env('API_KEY')
            ])
        ->get('https://api-football-beta.p.rapidapi.com/teams/statistics?team='.$team1->team_id.'&season=2021&league='.$team1->league.'')
        ->throw();
        $data1 = json_decode($response1->getBody(), true);
        $array1 = $data1['response'];
        
        $response2 = Http::withHeaders([
            'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
            'x-rapidapi-key' => env('API_KEY')
            ])
            ->get('https://api-football-beta.p.rapidapi.com/teams/statistics?team='.$team2->team_id.'&season=2021&league='.$team2->league.'')
            ->throw();
        $data2 = json_decode($response2->getBody(), true);
        $array2 = $data2['response'];

        $teams = Teams::all();
        if (count($teams) > 0 && count($array1) > 0 && count($array2) > 0) {
            return view('frontend.pages.comparisons.compareteams')->with([
                'teams' => $teams,
                'team1' => $array1,
                'team2' => $array2
            ]);
        }
        return view('frontend.pages.comparisons.compareteams')->withFlashDanger(__('Something went wrong.'));
    }
}

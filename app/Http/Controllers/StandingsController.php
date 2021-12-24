<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\League;
use Illuminate\Support\Facades\Http;

class StandingsController
{
    public function index()
    {
        $leagues = League::all();
        if (count($leagues) > 0) {
            $league = $leagues[0]['id'];
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                'x-rapidapi-key' => env('API_KEY')
                ])
                ->get('https://api-football-beta.p.rapidapi.com/standings?season=2021&league='.$league.'')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'];
            if (count($array) > 0) {
                return view('frontend.pages.standings.index')->with([
                    'leagues' => $leagues,
                    'standing' => $array,
                    'selectedleague' => $league
                ]);
            }
        }
        return redirect()->route('frontend.user.dashboard');
    }
    public function getstanding(Request $request)
    {
        if ($request->input('league') !== null) {
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'api-football-beta.p.rapidapi.com',
                'x-rapidapi-key' => env('API_KEY')
                ])
                ->get('https://api-football-beta.p.rapidapi.com/standings?season=2021&league='.$request->input('league').'')
                ->throw();
            $data = json_decode($response->getBody(), true);
            $array = $data['response'];
            $leagues = League::all();
            if (count($leagues) > 0 && count($array) > 0) {
                return view('frontend.pages.standings.index')->with([
                    'leagues' => $leagues,
                    'standing' => $array,
                    'selectedleague' => $request->input('league')
                ]);
            }
        }
        return redirect()->route('frontend.user.standings');
    }
}

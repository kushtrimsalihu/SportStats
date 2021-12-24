<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Domains\Auth\Models\Players;
use App\Http\Requests\StorePlayerRequest;
use Illuminate\Support\Facades\Artisan;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Players::paginate(8);
        return view('backend.players.index')->with('players', $players);
    }

    
    public function UpdatePlayers()
    {
        Artisan::call('command:update_players');
        return redirect()->route('admin.auth.players.index')->withFlashSuccess(__('Players were successfully updated.'));
    }
    
    public function RefreshPlayers()
    {
        Artisan::call('command:add_players');
        return redirect()->route('admin.auth.players.index')->withFlashSuccess(__('Players were successfully refreshed.'));
    }


    public function create()
    {
        // $SportsList = DB::table('sports')
        //     ->select('sports.*')
        //     ->get();
        // $PositionsList = DB::table('position')
        //     ->select('position.*')
        //     ->get();
        // $TeamsList = DB::table('teams')
        //     ->select('teams.*')
        //     ->get();
        // return view('backend.players.create',[
        //     'sports' => $SportsList,
        //     'positions' => $PositionsList,
        //     'teams' => $TeamsList
        // ]);
        $teams = Teams::all();

        return view('backend.auth.teams.create')->withTeams($teams);
    }

    public function store(StorePlayerRequest $request)
    {
        $validated = $request->validated();
        // $path = $request->file('file')->store('public/PlayerImages');
        // $filename = pathinfo($path)['basename'];
        $data = array(
                'player_id' => $request->input('player_id'),
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'age' => $request->input('age'),
                'height' => $request->input('height'),
                'photo' => $request->input('photo'),
                'nationality' => $request->input('nationality'),
                'place' => $request->input('place')
        );
        $insert = DB::table('players')->insert($data);
        if ($insert) {
            return redirect()->route('admin.auth.players.index')->withFlashSuccess(__('Success.'));
        }
        else {
            return view('backend.players.create')->withFlashDanger(__('Something went wrong.'));
        }
    }

    public function update($id)
    {
        $player = DB::table('players')
                    ->select('players.*')
                    ->where('player_id', '=', $id)->first();
        return view('backend.players.edit',[
            'player' => $player
        ]);
    }

    //me bo me model
    public function edit($id,StorePlayerRequest $request)
    {
        // $players = Player::find($id);
        // $team = Team::all();
        // return view('backend.auth.players.edit', compact('players', 'teams'));


        $validated = $request->validated();
        $player = DB::table('players')
                    ->select('players.*')
                    ->where('player_id', '=', $id)->first();
        if ($player) {
            $player = DB::update('update players 
            set firstname = ?,lastname=?,age=?,height=?,nationality=?,place=?,photo=?
            where player_id = ?',
            [$request->input('firstname'),
            $request->input('lastname'),
            $request->input('age'),
            $request->input('height'),
            $request->input('nationality'),
            $request->input('place'),
            $request->input('photo'),$id]);
            return redirect()->route('admin.auth.players.index')->withFlashSuccess(__('Success.'));
        }
        return redirect()->route('admin.auth.players.index')->withFlashDanger(__('Something went wrong.'));
    }

    public function show($id)
    {
        $player = DB::table('players')
            // ->join('sports', 'players.sports_id', '=', 'sports.sports_id')
             //->join('teams', 'players.teams', '=', 'teams.teams_id')
            //  ->join('teams', 'players.teams', '=', 'teams.teams_id')

            // ->join('position', 'players.position', '=', 'position.position_id')
            // ->select('players.*', 'sports.sport_name', 'teams.team_name', 'position.position_type')
            ->select('players.*')
            ->where('player_id', '=', $id)->first();
        if ($player) {
            return view('backend.players.show',[
                'player' => $player
            ]);
        }
        return redirect()->route('admin.auth.players.index')->withFlashDanger(__('Something went wrong.'));
    }
    public function Destroy($id)
    {
        $player = DB::table('players')
            ->where('player_id', '=', $id)->value('photo');
        Storage::delete('public/PlayerImages/'.$player);
        $player = DB::table('players')->where('player_id', $id)->delete();
        if ($player) {
            return redirect()->route('admin.auth.players.index')->withFlashSuccess(__('Success.'));
        }
        return redirect()->route('admin.auth.players.index')->withFlashDanger(__('Something went wrong.'));
    }
}

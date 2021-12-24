<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyVote;
use App\Domains\Auth\Models\Teams;
use Illuminate\Support\Facades\DB;

class DailyVoteController extends Controller
{

    public function index()
    {
        $dailyvote = DailyVote::paginate(8);
        return view('backend.dailyvote.index')->with('dailyvote', $dailyvote);
    }

    public function create()
    {
        $teams = Teams::all();
        return view('backend.dailyvote.create')->with('teams', $teams);
    }

    public function store(Request $request)
    {
        $team1exist = Teams::find($request->input('team1'));
        $team2exist = Teams::find($request->input('team2'));
        if ($team1exist && $team2exist) {
            $dailyvote = new DailyVote;
            $dailyvote->team1 = $request->input('team1');
            $dailyvote->team2 = $request->input('team2');
            $dailyvote->save();
            return redirect()->route('admin.auth.dailyvote.index')->withFlashSuccess(__('The Daily Vote was successfully created.'));
        }
        return redirect()->route('admin.auth.dailyvote.index')->withFlashSuccess(__('Failed.'));
    }

    public function show($id)
    {
        $dailyvote = DailyVote::findOrFail($id);
        $team1 = Teams::where('teams.team_id', '=', $dailyvote->team1)->first();
        $team2 = Teams::where('teams.team_id', '=', $dailyvote->team2)->first();
        if ($team1 && $team2) {
            return view('backend.dailyvote.show')->with([
                'team1' => $team1,
                'team2' => $team2
            ]);
        }
        return redirect()->route('admin.auth.dailyvote.index')->withFlashSuccess(__('The Daily Vote was successfully created.'));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        $dailyvote = DailyVote::findOrFail($id);
        $dailyvote->delete();
        return redirect()->route('admin.auth.dailyvote.index')->withFlashSuccess(_('Voting has been deleted'));
    }
}

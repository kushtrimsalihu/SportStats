<?php

namespace App\Domains\Auth\Http\Controllers\Backend\League;
use App\Domains\Auth\Http\Requests\Backend\League\LeagueRequest;
use App\Domains\Auth\Models\League;
use App\Domains\Auth\Models\Sports;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;


class LeagueController
{
    public function index()
    {
        $leagues = League::paginate(8);
        return view('backend.auth.league.index')->with('leagues', $leagues);
    }

    public function UpdateLeagues()
    {
        Artisan::call('command:update_leagues');
        return redirect()->route('admin.auth.league.index')->withFlashSuccess(__('Leagues were successfully updated.'));
    }

    public function RefreshLeagues()
    {
        Artisan::call('command:add_leagues');
        return redirect()->route('admin.auth.league.index')->withFlashSuccess(__('Leagues were successfully refreshed.'));
    }

    public function create()
    {
        $sports = Sports::all();
        return view('backend.auth.league.create')->withSports($sports);
    }

    public function store(LeagueRequest $request)
    {
        $league = new League;
        $league->country = $request->input('country');
        $league->name = $request->input('name');
        $league->type = $request->input('type');
        $league->logo = $request->input('logo');
        $league->save();
        return redirect()->route('admin.auth.league.index')->withFlashSuccess(__('The League was successfully created.'));
    }

    public function edit($id)
    {
        $league = DB::table('league')
                    ->select('league.*')
                    ->where('id', '=', $id)->first();
        return view('backend.auth.league.edit')->with('league', $league);
    }

    public function update(LeagueRequest $request, $id)
    {
        $league = League::find($id);
        $league->country = $request->input('country');
        $league->name = $request->input('name');
        $league->type = $request->input('type');
        $league->logo = $request->input('logo');
        $league->save();
        return redirect()->route('admin.auth.league.index')->withFlashSuccess(__('League Updated'));
    }

    public function show($id)
    {
        $league = League::find($id);
        if ($league) {
            return view('backend.auth.league.show',[
                'league' => $league
            ]);
        }
        return redirect()->route('admin.auth.league.index')->withFlashDanger(__('Something went wrong.'));
    }

    public function destroy($league_id)
    {
        $league = League::findOrFail($league_id);
        $league->delete();
        return redirect()->route('admin.auth.league.index')->withFlashSuccess(_('League Removed'));
    }
}

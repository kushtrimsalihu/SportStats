<?php
namespace App\Domains\Auth\Http\Controllers\Backend\Teams;
use App\Domains\Auth\Http\Requests\Backend\Teams\TeamsRequest;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\Teams;
use App\Domains\Auth\Models\League;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;



class TeamsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Teams::with('league')->paginate(8);
        return view('backend.auth.teams.index')->with('teams', $teams);
    }
    public function UpdateTeams()
    {
        Artisan::call('command:update_teams');
        return redirect()->route('admin.auth.teams.index')->withFlashSuccess(__('Teams were successfully updated.'));
    }
    public function RefreshTeams()
    {
        Artisan::call('command:add_teams');
        return redirect()->route('admin.auth.teams.index')->withFlashSuccess(__('Teams were successfully refreshed.'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $league = League::all();

        return view('backend.auth.teams.create')->withLeague($league);
        //return view('backend.auth.teams.create')->withLeague($league);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamsRequest $request)
    {

        // Create Post
        $team = new Teams;
        $team->team_id = $request->input('team_id');
        $team->name = $request->input('name');
        $team->country = $request->input('country');
        $team->founded = $request->input('founded');
        $team->national = $request->input('national');
        $team->league = $request->input('league');
        $team->logo = $request->input('logo');

        $team->save();

        return redirect()->route('admin.auth.teams.index')->withFlashSuccess(__('The Team was successfully created.'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team_id)


    {
        $teams = Teams::find($team_id);
        $league = League::all();
        return view('backend.auth.teams.edit', compact('teams', 'league'));
        //return view('backend.auth.teams.edit', compact('teams', 'league'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamsRequest $request, $team_id)
    {
       /* $this->validate($request,[
            'team_name'=>'required',
            'sports_id'=>'required',
            'league_id'=>'required'

        ]);
        */
        // Create Post
        $teams = Teams::find($team_id);
        $teams->name = $request->input('name');
        $teams->country = $request->input('country');
        $teams->founded = $request->input('founded');
        $teams->national = $request->input('national');
        $teams->league = $request->input('league');
        $teams->logo = $request->input('logo');
        $teams->save();

        return redirect()->route('admin.auth.teams.index')->withFlashSuccess(__('Teams Updated'));
    }
    public function show($team_id)
    {
        $teams = Teams::find($team_id);
        if ($teams) {
            return view('backend.auth.teams.show',[
                'team' => $teams
            ]);
        }
        return redirect()->route('admin.auth.teams.index')->withFlashDanger(__('Something went wrong.'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team_id)
    {
        $teams = Teams::findOrFail($team_id);
        $teams->delete();
        return redirect()->route('admin.auth.teams.index')->withFlashSuccess(_('Teams Removed'));
    }
}

<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Sports;

use App\Domains\Auth\Http\Requests\Backend\Sports\CreateSportsRequest;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\Sports;
use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;

class SportsController
{
    public function index()
    {  
        $sports = Sports::paginate(8);
        return view('backend.auth.sports.index',[
            'sports' => $sports
        ]);
    }

    public function create()
    {
        return view('backend.auth.sports.create');
    }

    public function store(CreateSportsRequest $request)
    {
        $sports = new Sports;
        $sports->sport_name = $request->input('sport_name');
        $sports->type = $request->input('type');
        $sports->save();
        return redirect()->route('admin.auth.sports.index')->withFlashSuccess(__('The sport was successfully created.'));
    }

    public function edit($sports_id)
    {
        $sports = Sports::find($sports_id);
        return view('backend.auth.sports.edit')->with([
            'sports' => $sports
        ]);
    }

    public function update(CreateSportsRequest $request, $sports_id)
    {
        $sports = Sports::find($sports_id);
        $sports->sport_name = $request->input('sport_name');
        $sports->type = $request->input('type');
        $sports->save();

        return redirect()->route('admin.auth.sports.index')->withFlashSuccess(__('Sports Updated'));
    }

    public function show($sports_id)
    {
        $sport = Sports::find($sports_id);
        if ($sport) {
            return view('backend.auth.sports.show')->with([
                'sport' => $sport
            ]);
        }
        return redirect()->route('admin.auth.sports.index')->withFlashDanger('Failed to find sport');
    }
    
    public function destroy($sports_id)
    {
        $sports = DB::table('sports')->where('sports_id', $sports_id)->delete();
        if($sports){
            return redirect()->route('admin.auth.sports.index')->withFlashSuccess('Sport Removed');
        }
        return redirect('/backend.auth.sports.index')->withFlashDanger('Fail');
    }
}
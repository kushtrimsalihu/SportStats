<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Statistics;

use App\Domains\Auth\Http\Requests\Backend\Statistics\StatisticsRequest;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\Statistics;
use App\Domains\Auth\Models\Players;
use Illuminate\Support\Facades\Artisan;


use App\Domains\Auth\Services\PermissionService;


class StatisticsController 
{
    public function index()
    {  
        $statistics = Statistics::with('players')->paginate(8);
        return view('backend.auth.role.statistics.index')->with('statistics', $statistics);

    }

    public function UpdateStatistics()
    {
        Artisan::call('command:update_statistics');
        return redirect()->route('admin.auth.statistics.index')->withFlashSuccess(__('Statistics were successfully updated.'));
    }

    public function RefreshStatistics()
    {
        Artisan::call('command:add_statistics');
        return redirect()->route('admin.auth.statistics.index')->withFlashSuccess(__('Statistics were successfully refreshed.'));
    }

    public function create()
    {
        $players = Players::all();
        return view('backend.auth.role.statistics.create')->withPlayers($players);
    }

    public function edit($statistics_id)
    {
        $statistic = Statistics::find($statistics_id);

        $players = Players::all();
       
        return view('backend.auth.role.statistics.edit', compact('statistic', 'players'));
    }

    public function update(StatisticsRequest $request, $statistics_id)
    {
        $statistic = Statistics::find($statistics_id);
        $statistic->matches_played = $request->input('matches_played');
        $statistic->goals = $request->input('goals');
        $statistic->assists = $request->input('assists');
        $statistic->yellow_cards = $request->input('yellow_cards');
        $statistic->red_cards = $request->input('red_cards');
        $statistic->player = $request->input('player');
        $statistic->from_date = $request->input('from_date');
        $statistic->to_date = $request->input('to_date');

        $statistic->save();

       return redirect()->route('admin.auth.statistics.index')->withFlashSuccess(_('Statistics is updated.'));
    }

    public function show($league,$player)
    {
        $statistic = Statistics::with(['players','league'])
            ->where('league' ,'=', $league)
            ->where('player' ,'=' ,$player)
            ->get();
        return view('backend.auth.role.statistics.show')->with(['statistic' => $statistic]);
    }

    public function destroy($league,$player)
    {
        $statistic = Statistics::where('league' ,'=', $league)
            ->where('player' ,'=' ,$player)
            ->delete();
        return redirect()->route('admin.auth.statistics.index')->withFlashSuccess(_('Statistics is removed.'));
    }
}
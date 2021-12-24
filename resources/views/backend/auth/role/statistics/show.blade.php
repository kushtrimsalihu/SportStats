@extends('backend.layouts.app')

@section('title', __('View Statistic'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Statistic')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.statistics.index')" :text="__('Back')" />
        </x-slot>
        <x-slot name="body">
            <table class="table">
                <tr>
                    <th>@lang('Player Name')</th>
                    <td>{{ $statistic[0]->players->firstname }}</td>
                </tr>
                <tr>
                    <th>@lang('Total shots')</th>
                    <td>{{ $statistic[0]->total_shots }}</td>
                </tr>
                <tr>
                    <th>@lang('On shots')</th>
                    <td>{{ $statistic[0]->on_shots }}</td>
                </tr>
                <tr>
                    <th>@lang('Minutes played')</th>
                    <td>{{ $statistic[0]->minutes }}</td>
                </tr>
                <tr>
                    <th>@lang('Appearences')</th>
                    <td>{{ $statistic[0]->appearences }}</td>
                </tr>
                <tr>
                    <th>@lang('Total goals')</th>
                    <td>{{ $statistic[0]->total_goals }}</td>
                </tr>
                <tr>
                    <th>@lang('Conceded goals')</th>
                    <td>{{ $statistic[0]->conceded_goals }}</td>
                </tr>
                <tr>
                    <th>@lang('Assists')</th>
                    <td>{{ $statistic[0]->assists_goals }}</td>
                </tr>
                <tr>
                    <th>@lang('Saves')</th>
                    <td>{{ $statistic[0]->saves_goals }}</td>
                </tr>
                <tr>
                    <th>@lang('Passes')</th>
                    <td>{{ $statistic[0]->total_passes }}</td>
                </tr>
                <tr>
                    <th>@lang('Key passes')</th>
                    <td>{{ $statistic[0]->key_passes }}</td>
                </tr>
                <tr>
                    <th>@lang('Accuracy')</th>
                    <td>{{ $statistic[0]->accuracy_passes }}</td>
                </tr>
                <tr>
                    <th>@lang('Tackles')</th>
                    <td>{{ $statistic[0]->total_tackles }}</td>
                </tr>
                <tr>
                    <th>@lang('Blocks tackles')</th>
                    <td>{{ $statistic[0]->blocks_tackles }}</td>
                </tr>
                <tr>
                    <th>@lang('Interceptions tackles')</th>
                    <td>{{ $statistic[0]->interceptions_tackles }}</td>
                </tr>
                <tr>
                    <th>@lang('Duels total')</th>
                    <td>{{ $statistic[0]->total_duels }}</td>
                </tr>
                <tr>
                    <th>@lang('Duels won')</th>
                    <td>{{ $statistic[0]->won_duels }}</td>
                </tr>
                <tr>
                    <th>@lang('Dribbles attempts')</th>
                    <td>{{ $statistic[0]->attempts_dribbles }}</td>
                </tr>
                <tr>
                    <th>@lang('Successfully dribbles')</th>
                    <td>{{ $statistic[0]->success_dribbles }}</td>
                </tr>
                <tr>
                    <th>@lang('Past dribbles')</th>
                    <td>{{ $statistic[0]->past_dribbles }}</td>
                </tr>
                <tr>
                    <th>@lang('Drawn fouls')</th>
                    <td>{{ $statistic[0]->drawn_fouls }}</td>
                </tr>
                <tr>
                    <th>@lang('Commited fouls')</th>
                    <td>{{ $statistic[0]->committed_fouls }}</td>
                </tr>
                <tr>
                    <th>@lang('Won penalty')</th>
                    <td>{{ $statistic[0]->yellow_cards }}</td>
                </tr>
                <tr>
                    <th>@lang('Committed penalty')</th>
                    <td>{{ $statistic[0]->commited_penalty }}</td>
                </tr>
                <tr>
                    <th>@lang('Scored penalty')</th>
                    <td>{{ $statistic[0]->scored_penalty }}</td>
                </tr>
                <tr>
                    <th>@lang('Missed penalty')</th>
                    <td>{{ $statistic[0]->missed_penalty }}</td>
                </tr>
                <tr>
                    <th>@lang('Saved penalty')</th>
                    <td>{{ $statistic[0]->saved_penalty }}</td>
                </tr>
                <tr>
                    <th>@lang('Yellow cards')</th>
                    <td>{{ $statistic[0]->yellow_cards }}</td>
                </tr>
                <tr>
                    <th>@lang('Red cards')</th>
                    <td>{{ $statistic[0]->red_cards }}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
    <hr>
@endsection

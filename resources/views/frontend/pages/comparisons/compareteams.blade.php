@extends('frontend.layouts.app')

@section('title', __('Compare Teams'))
@section('content')
<div class="container-dash">
    <div class="row justify-content-center">
        <div>
            <h2>Compare Teams</h2>
        </div>
    </div>
    <hr>
    <form action="{{ route('frontend.user.compareteams') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col justify-content-center">
                <select name="team1" class="form-control" required x-on:change="sport = $event.target.value">
                    @foreach($teams as $team)
                        @if(isset($team1) && $team->team_id == $team1['team']['id'])
                        <option value="{{ $team->team_id }}" selected>{{ $team->name }}</option>
                        @else
                        <option value="{{ $team->team_id }}">{{ $team->name }}</option>
                        @endif
                        @endforeach
                </select>
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-success">Compare</button>
            </div>
            <div class="form-group col">
                <select name="team2" class="form-control" required x-on:change="sport = $event.target.value">
                    @foreach($teams as $team)
                        @if(isset($team2) && $team->team_id == $team2['team']['id'])
                        <option value="{{ $team->team_id }}" selected>{{ $team->name }}</option>
                        @else
                        <option value="{{ $team->team_id }}">{{ $team->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </form>
    <div class="rounded bg-white shadow">
        @if(isset($team1) && isset($team2))
        <div class="mt-2 table-responsive-sm">
            <table class="table text-center">
                <tr>
                    <td>
                        <img src="{{ $team1['team']['logo'] }}" alt="">
                    </td>
                    <td></td>
                    <td>
                        <img src="{{ $team2['team']['logo'] }}" alt="">
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ $team1['team']['name']}}
                    </th>
                    <th>
                        Statistics
                    </th>
                    <th>
                        {{ $team2['team']['name'] }}
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ substr($team1['form'],0 ,5) }}
                    </td>
                    <td>Form</td>
                    <td>
                        {{ substr($team2['form'],0 ,5) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['fixtures']['played']['total'] > $team2['fixtures']['played']['total'])
                            {{ $team1['fixtures']['played']['total'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['fixtures']['played']['total'] == $team2['fixtures']['played']['total'])
                            {{ $team1['fixtures']['played']['total'] }}
                        @else
                            {{ $team1['fixtures']['played']['total'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Game Played</td>
                    <td>
                        @if($team2['fixtures']['played']['total'] > $team1['fixtures']['played']['total'])
                            {{ $team2['fixtures']['played']['total'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team2['fixtures']['played']['total'] == $team1['fixtures']['played']['total'])
                            {{ $team2['fixtures']['played']['total'] }}
                        @else
                            {{ $team2['fixtures']['played']['total'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if((($team1['fixtures']['wins']['total']*3)+($team1['fixtures']['draws']['total'])) > 
                            (($team2['fixtures']['wins']['total']*3)+($team2['fixtures']['draws']['total'])))
                            {{ $team1['fixtures']['wins']['total'] }}
                            /{{ $team1['fixtures']['draws']['total'] }}
                            /{{ $team1['fixtures']['loses']['total'] }}
                            <i class="fas fa-arrow-up text-success"></i>
                        @elseif((($team1['fixtures']['wins']['total']*3)+($team1['fixtures']['draws']['total'])) == 
                            (($team2['fixtures']['wins']['total']*3)+($team2['fixtures']['draws']['total'])))
                                {{ $team1['fixtures']['wins']['total'] }}
                                /{{ $team1['fixtures']['draws']['total'] }}
                                /{{ $team1['fixtures']['loses']['total'] }}
                        @else
                            {{ $team1['fixtures']['wins']['total'] }}
                            /{{ $team1['fixtures']['draws']['total'] }}
                            /{{ $team1['fixtures']['loses']['total'] }}
                            <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Wins/Draws/Loses</td>
                    <td>
                        @if((($team2['fixtures']['wins']['total']*3)+($team2['fixtures']['draws']['total'])) > 
                            (($team1['fixtures']['wins']['total']*3)+($team1['fixtures']['draws']['total'])))
                            {{ $team2['fixtures']['wins']['total'] }}
                            /{{ $team2['fixtures']['draws']['total'] }}
                            /{{ $team2['fixtures']['loses']['total'] }}
                            <i class="fas fa-arrow-up text-success"></i>
                        @elseif((($team2['fixtures']['wins']['total']*3)+($team2['fixtures']['draws']['total'])) == 
                            (($team1['fixtures']['wins']['total']*3)+($team1['fixtures']['draws']['total'])))
                                {{ $team2['fixtures']['wins']['total'] }}
                                /{{ $team2['fixtures']['draws']['total'] }}
                                /{{ $team2['fixtures']['loses']['total'] }}
                        @else
                            {{ $team2['fixtures']['wins']['total'] }}
                            /{{ $team2['fixtures']['draws']['total'] }}
                            /{{ $team2['fixtures']['loses']['total'] }}
                            <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['fixtures']['wins']['home'] > $team2['fixtures']['wins']['home'])
                            {{ $team1['fixtures']['wins']['home'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['fixtures']['wins']['home'] == $team2['fixtures']['wins']['home'])
                            {{ $team1['fixtures']['wins']['home'] }}
                        @else
                            {{ $team1['fixtures']['wins']['home'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Wins Home</td>
                    <td>
                        @if($team1['fixtures']['wins']['home'] < $team2['fixtures']['wins']['home'])
                            {{ $team2['fixtures']['wins']['home'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['fixtures']['wins']['home'] == $team2['fixtures']['wins']['home'])
                            {{ $team2['fixtures']['wins']['home'] }}
                        @else
                            {{ $team2['fixtures']['wins']['home'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['fixtures']['wins']['away'] > $team2['fixtures']['wins']['away'])
                            {{ $team1['fixtures']['wins']['away'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['fixtures']['wins']['away'] == $team2['fixtures']['wins']['away'])
                            {{ $team1['fixtures']['wins']['away'] }}
                        @else
                            {{ $team1['fixtures']['wins']['away'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Wins Away</td>
                    <td>
                        @if($team1['fixtures']['wins']['away'] < $team2['fixtures']['wins']['away'])
                            {{ $team2['fixtures']['wins']['away'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['fixtures']['wins']['away'] == $team2['fixtures']['wins']['away'])
                            {{ $team2['fixtures']['wins']['away'] }}
                        @else
                            {{ $team2['fixtures']['wins']['away'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['goals']['for']['total']['total'] > $team2['goals']['for']['total']['total'])
                            {{ $team1['goals']['for']['total']['total'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['for']['total']['total'] == $team2['goals']['for']['total']['total'])
                            {{ $team1['goals']['for']['total']['total'] }}
                        @else
                            {{ $team1['goals']['for']['total']['total'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Goals Total</td>
                    <td>
                        @if($team1['goals']['for']['total']['total'] < $team2['goals']['for']['total']['total'])
                            {{ $team2['goals']['for']['total']['total'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['for']['total']['total'] == $team2['goals']['for']['total']['total'])
                            {{ $team2['goals']['for']['total']['total'] }}
                        @else
                            {{ $team2['goals']['for']['total']['total'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['goals']['for']['total']['home'] > $team2['goals']['for']['total']['home'])
                            {{ $team1['goals']['for']['total']['home'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['for']['total']['home'] == $team2['goals']['for']['total']['home'])
                            {{ $team1['goals']['for']['total']['home'] }}
                        @else
                            {{ $team1['goals']['for']['total']['home'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Goals Home</td>
                    <td>
                        @if($team1['goals']['for']['total']['home'] < $team2['goals']['for']['total']['home'])
                            {{ $team2['goals']['for']['total']['home'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['for']['total']['home'] == $team2['goals']['for']['total']['home'])
                            {{ $team2['goals']['for']['total']['home'] }}
                        @else
                            {{ $team2['goals']['for']['total']['home'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['goals']['for']['total']['away'] > $team2['goals']['for']['total']['away'])
                            {{ $team1['goals']['for']['total']['away'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['for']['total']['away'] == $team2['goals']['for']['total']['away'])
                            {{ $team1['goals']['for']['total']['away'] }}
                        @else
                            {{ $team1['goals']['for']['total']['away'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Goals Away</td>
                    <td>
                        @if($team1['goals']['for']['total']['away'] < $team2['goals']['for']['total']['away'])
                            {{ $team2['goals']['for']['total']['away'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['for']['total']['away'] == $team2['goals']['for']['total']['away'])
                            {{ $team2['goals']['for']['total']['away'] }}
                        @else
                            {{ $team2['goals']['for']['total']['away'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['goals']['against']['total']['total'] < $team2['goals']['against']['total']['total'])
                            {{ $team1['goals']['against']['total']['total'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['against']['total']['total'] == $team2['goals']['against']['total']['total'])
                            {{ $team1['goals']['against']['total']['total'] }}
                        @else
                            {{ $team1['goals']['against']['total']['total'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Goals Conceded Total</td>
                    <td>
                        @if($team1['goals']['against']['total']['total'] > $team2['goals']['against']['total']['total'])
                            {{ $team2['goals']['against']['total']['total'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['against']['total']['total'] == $team2['goals']['against']['total']['total'])
                            {{ $team2['goals']['against']['total']['total'] }}
                        @else
                            {{ $team2['goals']['against']['total']['total'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['goals']['against']['total']['home'] < $team2['goals']['against']['total']['home'])
                            {{ $team1['goals']['against']['total']['home'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['against']['total']['home'] == $team2['goals']['against']['total']['home'])
                            {{ $team1['goals']['against']['total']['home'] }}
                        @else
                            {{ $team1['goals']['against']['total']['home'] }}<i class="fas fa-arrow-down text-danger"></i>
                    @endif
                    </td>
                    <td>Goals Conceded Home</td>
                    <td>
                        @if($team1['goals']['against']['total']['home'] > $team2['goals']['against']['total']['home'])
                            {{ $team2['goals']['against']['total']['home'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['against']['total']['home'] == $team2['goals']['against']['total']['home'])
                            {{ $team2['goals']['against']['total']['home'] }}
                        @else
                            {{ $team2['goals']['against']['total']['home'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['goals']['against']['total']['away'] < $team2['goals']['against']['total']['away'])
                            {{ $team1['goals']['against']['total']['away'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['against']['total']['away'] == $team2['goals']['against']['total']['away'])
                            {{ $team1['goals']['against']['total']['away'] }}
                        @else
                            {{ $team1['goals']['against']['total']['away'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Goals Conceded Away</td>
                    <td>
                        @if($team1['goals']['against']['total']['away'] > $team2['goals']['against']['total']['away'])
                            {{ $team2['goals']['against']['total']['away'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['goals']['against']['total']['away'] == $team2['goals']['against']['total']['away'])
                            {{ $team2['goals']['against']['total']['away'] }}
                        @else
                            {{ $team2['goals']['against']['total']['away'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['clean_sheet']['total'] > $team2['clean_sheet']['total'])
                            {{ $team1['clean_sheet']['total'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['clean_sheet']['total'] == $team2['clean_sheet']['total'])
                            {{ $team1['clean_sheet']['total'] }}
                        @else
                            {{ $team1['clean_sheet']['total'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Clean Sheet Total</td>
                    <td>
                        @if($team1['clean_sheet']['total'] < $team2['clean_sheet']['total'])
                            {{ $team2['clean_sheet']['total'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['clean_sheet']['total'] == $team2['clean_sheet']['total'])
                            {{ $team2['clean_sheet']['total'] }}
                        @else
                            {{ $team2['clean_sheet']['total'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['clean_sheet']['home'] > $team2['clean_sheet']['home'])
                            {{ $team1['clean_sheet']['home'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['clean_sheet']['home'] == $team2['clean_sheet']['home'])
                            {{ $team1['clean_sheet']['home'] }}
                        @else
                            {{ $team1['clean_sheet']['home'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Clean Sheet Home</td>
                    <td>
                        @if($team1['clean_sheet']['home'] < $team2['clean_sheet']['home'])
                            {{ $team2['clean_sheet']['home'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['clean_sheet']['home'] == $team2['clean_sheet']['home'])
                            {{ $team2['clean_sheet']['home'] }}
                        @else
                            {{ $team2['clean_sheet']['home'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($team1['clean_sheet']['away'] > $team2['clean_sheet']['away'])
                            {{ $team1['clean_sheet']['away'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['clean_sheet']['away'] == $team2['clean_sheet']['away'])
                            {{ $team1['clean_sheet']['away'] }}
                        @else
                            {{ $team1['clean_sheet']['away'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Clean Sheet Away</td>
                    <td>
                        @if($team1['clean_sheet']['away'] < $team2['clean_sheet']['away'])
                            {{ $team2['clean_sheet']['away'] }}<i class="fas fa-arrow-up text-success"></i>
                        @elseif($team1['clean_sheet']['away'] == $team2['clean_sheet']['away'])
                            {{ $team2['clean_sheet']['away'] }}
                        @else
                            {{ $team2['clean_sheet']['away'] }}<i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
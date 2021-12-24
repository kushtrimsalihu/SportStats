@extends('frontend.layouts.app')

@section('title', __('Compare Players'))
@section('content')
<div class="container-dash">
    <div class="row justify-content-center">
        <div>
            <h2>Compare Players</h2>
        </div>
    </div>
    <hr>
    <form action="{{ route('frontend.user.compareplayers') }}" method="GET">
        @csrf
        <div class="row">
            <div class="form-group col justify-content-center">
                <select name="player1[0]" class="form-control" required x-on:change="sport = $event.target.value">
                    @foreach($players  as $player)
                        @if(isset($player1[0]) && $player->player_id == $player1[0]->player_id)
                        <option value="{{ $player->player_id }}" selected>{{ $player->firstname }} {{ $player->lastname }}</option>
                        @else
                        <option value="{{ $player->player_id }}">{{ $player->firstname }} {{ $player->lastname }}</option>
                        @endif
                        @endforeach
                </select>
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-success">Compare</button>
            </div>
            <div class="form-group col">
                <select name="player2[0]" class="form-control" required x-on:change="sport = $event.target.value">
                    @foreach($players as $player)
                    @if(isset($player2[0]) && $player->player_id == $player2[0]->player_id)
                        <option value="{{ $player->player_id }}" selected>{{ $player->firstname }} {{ $player->lastname }}</option>
                        @else
                        <option value="{{ $player->player_id }}">{{ $player->firstname }} {{ $player->lastname }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </form>
    <div class="rounded bg-white shadow">
    <?php
        // echo var_dump($player1[0]->photo);
    ?>
        @if(isset($player1[0]) && isset($player2[0]))
        <div class="mt-2 table-responsive-sm">
            <table class="table text-center">
                <tr>
                    <td>
                        <img src="{{ $player1[0]->photo }}" alt="">
                    </td>
                    <td></td>
                    <td>
                        <img src="{{ $player2[0]->photo }}" alt="">
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ $player1[0]->firstname}} {{$player1[0]->lastname}}
                    </th>
                    <th>
                        Statistics
                    </th>
                    <th>
                        {{ $player2[0]->firstname }} {{$player2[0]->lastname}}
                    </th>
                </tr>
                    <td>
                        @if($player1[0]->total_shots > $player2[0]->total_shots)
                            {{ $player1[0]->total_shots }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->total_shots == $player2[0]->total_shots)
                            {{ $player1[0]->total_shots }}
                        @else
                            {{ $player1[0]->total_shots }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Total Shots</td>
                    <td>
                        @if($player2[0]->total_shots > $player1[0]->total_shots)
                            {{ $player2[0]->total_shots }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player2[0]->total_shots == $player1[0]->total_shots)
                            {{$player2[0]->total_shots}}
                        @else
                            {{ $player2[0]->total_shots }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->minutes > $player2[0]->minutes)
                            {{ $player1[0]->minutes }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->minutes == $player2[0]->minutes)
                            {{ $player1[0]->minutes }}
                        @else
                            {{ $player1[0]->minutes }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Minutes Played</td>
                    <td>
                        @if($player2[0]->minutes > $player1[0]->minutes)
                            {{ $player2[0]->minutes }} <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->minutes == $player2[0]->minutes)
                            {{ $player2[0]->minutes }}
                        @else
                            {{ $player2[0]->minutes }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->won_penalty > $player2[0]->won_penalty)
                            {{ $player1[0]->won_penalty }} <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->won_penalty == $player2[0]->won_penalty)
                            {{ $player1[0]->won_penalty }}
                        @else
                            {{ $player1[0]->won_penalty }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Wins Penalty</td>
                    <td>
                        @if($player2[0]->won_penalty > $player1[0]->won_penalty)
                            {{ $player2[0]->won_penalty }} <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player2[0]->won_penalty == $player1[0]->won_penalty)
                            {{ $player2[0]->won_penalty }}
                        @else
                            {{ $player2[0]->won_penalty }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->attempts_dribbles > $player2[0]->attempts_dribbles)
                            {{ $player1[0]->attempts_dribbles }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->attempts_dribbles == $player2[0]->attempts_dribbles)
                            {{ $player1[0]->attempts_dribbles }}
                        @else
                            {{ $player1[0]->attempts_dribbles }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Attempts Dribbles</td>
                    <td>
                        @if($player2[0]->attempts_dribbles > $player1[0]->attempts_dribbles)
                            {{ $player2[0]->attempts_dribbles }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->attempts_dribbles == $player2[0]->attempts_dribbles)
                            {{ $player2[0]->attempts_dribbles }}
                        @else
                            {{ $player2[0]->attempts_dribbles }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->total_goals > $player2[0]->total_goals)
                            {{ $player1[0]->total_goals }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->total_goals == $player2[0]->total_goals)
                            {{ $player1[0]->total_goals }}
                        @else
                            {{ $player1[0]->total_goals }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Total Goals</td>
                    <td>
                        @if($player2[0]->total_goals > $player1[0]->total_goals)
                            {{ $player2[0]->total_goals }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->total_goals == $player2[0]->total_goals)
                            {{ $player2[0]->total_goals }}
                        @else
                            {{ $player2[0]->total_goals }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->total_passes > $player2[0]->total_passes)
                            {{ $player1[0]->total_passes }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->total_passes == $player2[0]->total_passes)
                            {{ $player1[0]->total_passes }}
                        @else
                            {{ $player1[0]->total_passes }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Total Passes</td>
                    <td>
                        @if($player2[0]->total_passes > $player1[0]->total_passes)
                            {{ $player2[0]->total_passes }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->total_passes == $player2[0]->total_passes)
                            {{ $player2[0]->total_passes }}
                        @else
                            {{ $player2[0]->total_passes }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->scored_penalty > $player2[0]->scored_penalty)
                            {{ $player1[0]->scored_penalty }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->scored_penalty == $player2[0]->scored_penalty)
                            {{ $player1[0]->scored_penalty }}
                        @else
                            {{ $player1[0]->scored_penalty }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Scored Penalty</td>
                    <td>
                        @if($player2[0]->scored_penalty > $player1[0]->scored_penalty)
                            {{ $player2[0]->scored_penalty }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->scored_penalty == $player2[0]->scored_penalty)
                            {{ $player2[0]->scored_penalty }}
                        @else
                            {{ $player2[0]->scored_penalty }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->assists_goals > $player2[0]->assists_goals)
                            {{ $player1[0]->assists_goals }} <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->assists_goals == $player2[0]->assists_goals)
                            {{ $player1[0]->assists_goals }}
                        @else
                            {{ $player1[0]->assists_goals }} <i class="fas fa-arrow-down text-danger"></i>
                    @endif
                    </td>
                    <td>Assists Goals</td>
                    <td>
                        @if($player2[0]->assists_goals > $player1[0]->assists_goals)
                            {{ $player2[0]->assists_goals }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->assists_goals == $player2[0]->assists_goals)
                            {{ $player2[0]->assists_goals }}
                        @else
                            {{ $player2[0]->assists_goals }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>
                        @if($player1[0]->accuracy_passes > $player2[0]->accuracy_passes)
                            {{ $player1[0]->accuracy_passes }} <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->accuracy_passes == $player2[0]->accuracy_passes)
                            {{ $player1[0]->accuracy_passes }}
                        @else
                            {{ $player1[0]->accuracy_passes }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Accuracy Passes</td>
                    <td>
                        @if($player1[0]->accuracy_passes < $player2[0]->accuracy_passes)
                            {{ $player2[0]->accuracy_passes }} <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->accuracy_passes == $player2[0]->accuracy_passes)
                            {{ $player2[0]->accuracy_passes }}
                        @else
                            {{ $player2[0]->accuracy_passes }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->total_tackles > $player2[0]->total_tackles)
                            {{ $player1[0]->total_tackles }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->total_tackles == $player2[0]->total_tackles)
                            {{ $player1[0]->total_tackles }}
                        @else
                            {{ $player1[0]->total_tackles }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Total Tackles</td>
                    <td>
                        @if($player1[0]->total_tackles < $player2[0]->total_tackles)
                            {{ $player2[0]->total_tackles }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->total_tackles == $player2[0]->total_tackles)
                            {{ $player2[0]->total_tackles }}
                        @else
                            {{ $player2[0]->total_tackles }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->yellow_cards > $player2[0]->yellow_cards)
                            {{ $player1[0]->yellow_cards }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->yellow_cards == $player2[0]->yellow_cards)
                            {{ $player1[0]->yellow_cards }}
                        @else
                            {{ $player1[0]->yellow_cards }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Yellow Cards</td>
                    <td>
                        @if($player1[0]->yellow_cards < $player2[0]->yellow_cards)
                            {{ $player2[0]->yellow_cards }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->yellow_cards == $player2[0]->yellow_cards)
                            {{ $player2[0]->yellow_cards }}
                        @else
                            {{ $player2[0]->yellow_cards }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($player1[0]->red_cards > $player2[0]->red_cards)
                            {{ $player1[0]->red_cards }} <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->red_cards == $player2[0]->red_cards)
                            {{ $player1[0]->red_cards }}
                        @else
                            {{ $player1[0]->red_cards }} <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                    <td>Red Cards</td>
                    <td>
                        @if($player1[0]->red_cards < $player2[0]->red_cards)
                            {{ $player2[0]->red_cards }}  <i class="fas fa-arrow-up text-success"></i>
                        @elseif($player1[0]->red_cards == $player2[0]->red_cards)
                            {{ $player2[0]->red_cards }}
                        @else
                            {{ $player2[0]->red_cards }}  <i class="fas fa-arrow-down text-danger"></i>
                        @endif
                    </td>
                </tr>
            </table>  
        </div>
        @endif
    </div>
  
</div>
@endsection 
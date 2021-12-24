@extends('frontend.layouts.app')
<!-- Font | Optional-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:300,400,700" /> @section('title', __('Dashboard')) @section('content')
<div class="container-dash">
    <div class="row dashboard-box shad">
        <div class="col-12">
            <h2 class="line-heading">Top Players</h2>
            <div class="d-flex justify-content-end">
                <div class="tabs tabs2 nav nav-tabs ms-auto" id="nav-tab" role="tablist">
                    <div class="selector"></div>
                    <x-utils.link :text="__('Attacker')" class="active" id="country-tab" data-toggle="pill" href="#attacker" role="tab" aria-controls="country" aria-selected="true" />
                    <x-utils.link :text="__('Midfielder')" class="link1" data-toggle="pill" href="#midfielder" role="tab" aria-selected="false" />
                    <x-utils.link :text="__('Defender')" class="link2" data-toggle="pill" href="#defender" role="tab" aria-selected="false" />
                    <x-utils.link :text="__('Goalkeeper')" class="link2" data-toggle="pill" href="#goalkeeper" role="tab" aria-selected="false" />
                </div>
            </div>
            <div class="tab-content">
                <div id="attacker" class="tab-pane fade in active show">
                    <table class="fold-table table-responsive-md">
                        <thead>
                            <tr>
                                <th>RANKING <br>Sesson 2021</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>SCORE</th>
                            </tr>
                        </thead>
                        @foreach($topperformances->slice(0, 50) as $performances) @if($performances->position == 'Attacker')
                        <tbody>
                            <tr class="view">
                                <td class="view" style="width: 10%">
                                    <h1 class="rank-font">{{$performances->rank}}</h1>
                                </td>
                                <td class="view" style="width: 20%"> <img src="{{$performances->photo}}" alt=""></td>
                                <td class="view" style="width: 1">
                                    <div class="d-flex align-items-center justify-content-center">

                                        <div class="my-auto d-flex">
                                            @if($performances->rank
                                            < $performances->old_rank)
                                                <i class="fas fa-2x fa-chevron-up text-success"></i>
                                                <h5 class="px-2 mt-1">{{ $performances->old_rank - $performances->rank }}</h5>
                                                @elseif($performances->old_rank == $performances->rank)
                                                <i class="fas fa-2x fa-chevron-right"></i> @else
                                                <i class="fas fa-2x fa-chevron-down text-danger"></i>
                                                <h5 class="px-2 mt-1">{{ $performances->old_rank - $performances->rank }}</h5>
                                                @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <h3 class="fv-bold"><a href="{{URL::route('frontend.user.show', $performances->player_id)}}">{{$performances->firstname}} {{$performances->lastname}}</a></h3>
                                        <h5 class="fv-bold">{{$performances->position}}</h5>
                                    </div>
                                </td>
                                <td class="view"  style="width: 13%">
                                    <div class="my-auto ">
                                        <i class="fas fa-2x fa-plus"></i>
                                    </div>
                                </td>
                                <td class="view" style="width: 45">
                                    <h1 class="rank-font">{{$performances->score}}</h1>
                                </td>
                            </tr>
                            <tr class="fold">
                                <td colspan="7">
                                    <div class="fold-content">
                                        <div class="mt-1">
                                            <table class="table-rank table-responsive-md text-center">
                                              <thead class="thead-primary">
                                                <tr>
                                                  <th class="text-center">Teams</th>
                                                  <th class="text-center">Age</th>
                                                  <th class="text-center">Height</th>
                                                  <th class="text-center">Nationality</th>
                                                  <th class="text-center">Place</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td><img width="30%" src="{{$performances->logo}}" alt=""></td>
                                                  <td><h5>{{$performances->age}}</h5></td>
                                                  <td><h5>{{$performances->height}}</h5></td>
                                                  <td><h5>{{$performances->nationality}}</h5></td>
                                                  <td><h5>{{$performances->place}}</h5></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                        <div class="table-wrap mt-4">
                                            <table class="table-rank table-responsive-md text-center">
                                                <thead class="thead-primary">
                                                    <tr>
                                                      <th class="text-center">Total Shots</th>
                                                      <th class="text-center">Total Goals</th>
                                                      <th class="text-center">Assists Goals</th>
                                                      <th class="text-center">Minutes Played</th>
                                                      <th class="text-center">Yellow Cards</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td><h5>{{$performances->total_shots}}</h5></td>
                                                      <td><h5>{{$performances->total_goals}}</h5></td>
                                                      <td><h5>{{$performances->assists_goals}}</h5></td>
                                                      <td><h5>{{$performances->minutes}}</h5></td>
                                                      <td><h5>{{$performances->yellow_cards}}</h5>
                                                        <i class="fas yellow-card fa-copy"></td>
                                                    </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
                <div id="midfielder" class="tab-pane fade">
                    <table class="fold-table table-responsive-sm">
                        <thead>
                          <tr>
                            <th>RANKING <br>Sesson 2021</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>SCORE</th>
                          </tr>
                        </thead>
                        @foreach($topperformances->slice(0, 50) as $performances)
                            @if($performances->position == 'Midfielder')
                        <tbody>
                          <tr class="view">
                            <td class="view" style="width: 10%"><h1 class="rank-font">{{$performances->rank}}</h1></td>
                            <td class="view" style="width: 20%"> <img src="{{$performances->photo}}" alt=""></td>
                            <td class="view" style="width: 1">
                              <div class="d-flex align-items-center justify-content-center">
                                    <div class="my-auto d-flex">
                                        @if($performances->rank < $performances->old_rank)
                                        <i class="fas fa-2x fa-chevron-up text-success"></i>
                                            <h5 class="px-2 mt-1">{{ $performances->old_rank - $performances->rank }}</h5>
                                            @elseif($performances->old_rank == $performances->rank)
                                            <i class="fas fa-2x fa-chevron-right"></i> @else
                                            <i class="fas fa-2x fa-chevron-down text-danger"></i>
                                            <h5 class="px-2 mt-1">{{ $performances->old_rank - $performances->rank }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h3 class="fv-bold"><a href="{{URL::route('frontend.user.show', $performances->player_id)}}">{{$performances->firstname}} {{$performances->lastname}}</a></h3>
                                    <h5 class="fv-bold">{{$performances->position}}</h5>
                                </div>
                            </td>
                            <td class="view" style="width: 13%">
                                <div class="my-auto ">
                                    <i class="fas fa-2x fa-plus"></i>
                                </div>
                            </td>
                            <td class="view" style="width: 45">
                                <h1 class="rank-font">{{$performances->score}}</h1>
                            </td>
                            </tr>
                            <tr class="fold">
                                <td colspan="7">
                                    <div class="fold-content">
                                        <div class="mt-1">
                                            <table class="table-rank table-responsive-md text-center">
                                              <thead class="thead-primary">
                                                <tr>
                                                  <th class="text-center">Teams</th>
                                                  <th class="text-center">Age</th>
                                                  <th class="text-center">Height</th>
                                                  <th class="text-center">Nationality</th>
                                                  <th class="text-center">Place</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td><img width="30%" src="{{$performances->logo}}" alt=""></td>
                                                  <td><h5>{{$performances->age}}</h5></td>
                                                  <td><h5>{{$performances->height}}</h5></td>
                                                  <td><h5>{{$performances->nationality}}</h5></td>
                                                  <td><h5>{{$performances->place}}</h5></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                        <div class="table-wrap mt-4">
                                            <table class="table-rank table-responsive-md text-center">
                                                <thead class="thead-primary">
                                                    <tr>
                                                      <th class="text-center">Won Duels</th>
                                                      <th class="text-center">Total Goals</th>
                                                      <th class="text-center">Assists Goals</th>
                                                      <th class="text-center">Minutes Played</th>
                                                      <th class="text-center">Yellow Cards</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td><h5>{{$performances->won_duels}}</h5></td>
                                                      <td><h5>{{$performances->total_goals}}</h5></td>
                                                      <td><h5>{{$performances->assists_goals}}</h5></td>
                                                      <td><h5>{{$performances->minutes}}</h5></td>
                                                      <td><h5>{{$performances->yellow_cards}}</h5>
                                                        <i class="fas yellow-card fa-copy"></td>
                                                    </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endif
                                    @endforeach
                                </table>
                            </div>
                <div id="defender" class="tab-pane fade">
                    <table class="fold-table table-responsive-sm">
                        <thead>
                          <tr>
                            <th>RANKING <br>Sesson 2021</th>                           
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>SCORE</th>
                          </tr>
                        </thead>

                        @foreach($topperformances->slice(0, 50) as $performances)
                            @if($performances->position == 'Defender')
                        <tbody>
                          <tr class="view">
                            <td class="view" style="width: 10%"><h1 class="rank-font">{{$performances->rank}}</h1></td>
                            <td class="view" style="width: 20%"> <img src="{{$performances->photo}}" alt=""></td>
                            <td class="view" style="width: 1">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="my-auto d-flex">
                                      @if($performances->rank < $performances->old_rank)
                                      <i class="fas fa-2x fa-chevron-up text-success"></i>
                                            <h5 class="px-2 mt-1">{{ $performances->old_rank - $performances->rank }}</h5>
                                            @elseif($performances->old_rank == $performances->rank)
                                            <i class="fas fa-2x fa-chevron-right"></i> @else
                                            <i class="fas fa-2x fa-chevron-down text-danger"></i>
                                            <h5 class="px-2 mt-1">{{ $performances->old_rank - $performances->rank }}</h5>
                                            @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h3 class="fv-bold"><a href="{{URL::route('frontend.user.show', $performances->player_id)}}">{{$performances->firstname}} {{$performances->lastname}}</a></h3>
                                    <h5 class="fv-bold">{{$performances->position}}</h5>
                                </div>
                            </td>
                            <td class="view" style="width: 13%">
                                <div class="my-auto ">
                                    <i class="fas fa-2x fa-plus"></i>
                                </div>
                            </td>
                            <td class="view" style="width: 45">
                                <h1 class="rank-font">{{$performances->score}}</h1>
                            </td>
                            </tr>
                            <tr class="fold">
                                <td colspan="7">
                                    <div class="fold-content">
                                        <div class="mt-1">
                                            <table class="table-rank table-responsive-md text-center">
                                              <thead class="thead-primary">
                                                <tr>
                                                  <th class="text-center">Teams</th>
                                                  <th class="text-center">Age</th>
                                                  <th class="text-center">Height</th>
                                                  <th class="text-center">Nationality</th>
                                                  <th class="text-center">Place</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td><img width="30%" src="{{$performances->logo}}" alt=""></td>
                                                  <td><h5>{{$performances->age}}</h5></td>
                                                  <td><h5>{{$performances->height}}</h5></td>
                                                  <td><h5>{{$performances->nationality}}</h5></td>
                                                  <td><h5>{{$performances->place}}</h5></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                        <div class="table-wrap mt-4">
                                            <table class="table-rank table-responsive-md text-center">
                                                <thead class="thead-primary">
                                                    <tr>
                                                      <th class="text-center">Total Tackles</th>
                                                      <th class="text-center">Won Duels</th>
                                                      <th class="text-center">Drawn Fouls</th>
                                                      <th class="text-center">Minutes Played</th>
                                                      <th class="text-center">Yellow Cards</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td><h5>{{$performances->total_tackles}}</h5></td>
                                                      <td><h5>{{$performances->won_duels}}</h5></td>
                                                      <td><h5>{{$performances->drawn_fouls}}</h5></td>
                                                      <td><h5>{{$performances->minutes}}</h5></td>
                                                      <td><h5>{{$performances->yellow_cards}}</h5>
                                                        <i class="fas yellow-card fa-copy"></td>
                                                    </tr>
                                              </tbody>
                                            </table>
                                              </div>
                                            </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                        @endif
                                        @endforeach
                                    </table>
                                </div>
                                <div id="goalkeeper" class="tab-pane fade">
                                <table class="fold-table table-responsive-sm">
                                    <thead>
                                    <tr>
                                        <th>RANKING <br>Sesson 2021</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>SCORE</th>
                                    </tr>
                                    </thead>
                                    @foreach($topperformances->slice(0, 50) as $performances)
                                        @if($performances->position == 'Goalkeeper')
                                    <tbody>
                                    <tr class="view">
                                        <td class="view" style="width: 10%"><h1 class="rank-font">{{$performances->rank}}</h1></td>
                                        <td class="view" style="width: 20%"> <img src="{{$performances->photo}}" alt=""></td>
                                        <td class="view" style="width: 1">
                                        <div class="d-flex align-items-center justify-content-center">
                                    <div class="my-auto d-flex">
                                      @if($performances->rank < $performances->old_rank)
                                      <i class="fas fa-2x fa-chevron-up text-success"></i>
                                        <h5 class="px-2 mt-1">{{ $performances->old_rank - $performances->rank }}</h5>
                                        @elseif($performances->old_rank == $performances->rank)
                                        <i class="fas fa-2x fa-chevron-right"></i> @else
                                        <i class="fas fa-2x fa-chevron-down text-danger"></i>
                                        <h5 class="px-2 mt-1">{{ $performances->old_rank - $performances->rank }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h3 class="fv-bold"><a href="{{URL::route('frontend.user.show', $performances->player_id)}}">{{$performances->firstname}} {{$performances->lastname}}</a></h3>
                                    <h5 class="fv-bold">{{$performances->position}}</h5>
                                </div>
                            </td>
                            <td class="view" style="width: 13%">
                                <div class="my-auto ">
                                    <i class="fas fa-2x fa-plus"></i>
                                </div>
                            </td>
                            <td class="view" style="width: 45">
                                <h1 class="rank-font">{{$performances->score}}</h1>
                            </td>
                            </tr>
                            <tr class="fold">
                                <td colspan="7">
                                    <div class="fold-content">
                                        <div class="mt-1">
                                            <table class="table-rank table-responsive-md text-center">
                                              <thead class="thead-primary">
                                                <tr>
                                                  <th class="text-center">Teams</th>
                                                  <th class="text-center">Age</th>
                                                  <th class="text-center">Height</th>
                                                  <th class="text-center">Nationality</th>
                                                  <th class="text-center">Place</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td><img width="30%" src="{{$performances->logo}}" alt=""></td>
                                                  <td><h5>{{$performances->age}}</h5></td>
                                                  <td><h5>{{$performances->height}}</h5></td>
                                                  <td><h5>{{$performances->nationality}}</h5></td>
                                                  <td><h5>{{$performances->place}}</h5></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                        <div class="table-wrap mt-4">
                                            <table class="table-rank table-responsive-md text-center">
                                                <thead class="thead-primary">
                                                    <tr>
                                                      <th class="text-center">Saves Goals</th>
                                                      <th class="text-center">Accuracy Passes</th>
                                                      <th class="text-center">Key Passes</th>
                                                      <th class="text-center">Minutes Played</th>
                                                      <th class="text-center">Yellow Cards</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td><h5>{{$performances->saves_goals}}</h5></td>
                                                      <td><h5>{{$performances->accuracy_passes}}</h5></td>
                                                      <td><h5>{{$performances->key_passes}}</h5></td>
                                                      <td><h5>{{$performances->minutes}}</h5></td>
                                                      <td><h5>{{$performances->yellow_cards}}</h5>
                                                        <i class="fas yellow-card fa-copy"></td>
                                                    </tr>
                                              </tbody>
                                            </table>
                                              </div>
                                            </div>   
                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>   
    </div><!--container-->
@endsection
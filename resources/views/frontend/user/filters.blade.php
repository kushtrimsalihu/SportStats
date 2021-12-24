@extends('frontend.layouts.app')
<!-- Font | Optional-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:300,400,700" /> @section('title', __('Dashboard')) @section('content')
<div class="container-dash">
    <div class="row dashboard-box shad mb-5">
        <div class="col-12  ">
            <div class="p-3 py-5">
                <div class="profile main mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <div class="tabs nav nav-tabs" id="nav-tab" role="tablist">
                            <div class="selector"></div>
                            <x-utils.link :text="__('Country')" class="active back1" id="country-tab" data-toggle="pill" href="#country" role="tab" aria-controls="country" aria-selected="true" />
                            <x-utils.link :text="__('Leagues')" class="link1 back-to-leagues" id="information-tab" data-toggle="pill" href="#leagues" role="tab" aria-controls="information" aria-selected="false" />
                            <x-utils.link :text="__('Teams')" class="link2" id="password-tab" data-toggle="pill" href="#teams" role="tab" aria-controls="password" aria-selected="false" />
                        </div>
                    </div>
                </div>
                <hr style="color: #1BBF7A">
                <div class="tab-content" id="country-tabsContent">
                    <div class="tab-pane fade pt-3 show active back1" id="country" role="tabpanel" aria-labelledby="country-tab">
                        {{--
                        <div class="scroll-country"> --}}
                            <ul class="width-country checkbox-design" id="filters">
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="World" id="filter-World" />
                                    <label for="filter-World">World</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="England" id="filter-England" />
                                    <label for="filter-England">England</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Germany" id="filter-Germany" />
                                    <label for="filter-Germany">Germany</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Spain" id="filter-Spain" />
                                    <label for="filter-Spain">Spain</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Italy" id="filter-Italy" />
                                    <label for="filter-Italy">Italy</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="France" id="filter-France" />
                                    <label for="filter-France">France</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Netherlands" id="filter-Netherlands" />
                                    <label for="filter-Netherlands">Netherlands</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Albania" id="filter-Albania" />
                                    <label for="filter-Albania">Albania</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Austria" id="filter-Austria" />
                                    <label for="filter-Austria">Austria</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Armenia" id="filter-Armenia" />
                                    <label for="filter-Armenia">Armenia</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Argentina" id="filter-Argentina" />
                                    <label for="filter-Argentina">Argentina</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Portugalia" id="filter-Portugalia" />
                                    <label for="filter-Portugalia">Portugalia</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="switch-button-checkbox" value="Kosovo" id="filter-Kosovo" />
                                    <label for="filter-Kosovo">Kosovo</label>
                                </li>
                            </ul>
                    </div>
                    <div class="tab-pane fade pt-3 link1 back-to-leagues" id="leagues" role="tabpanel" aria-labelledby="information-tab">
                            <ul class="width-leagues checkbox-design" id="filters">
                                @foreach($leagues as $league)
                                <li class="{{$league->country}}" style="display: none;">
                                    <input type="checkbox" class="switch-button-checkbox-teams" value="{{$league->id}}league" id="filter-{{$league->id}}league" />
                                    <label for="filter-{{$league->id}}league">{{$league->name}}</label>
                                </li>
                                @endforeach
                            </ul>
                            <div class="label-padding">
                                <label for="for-back" class="btn btn-back-filter btn-outline-success">Back<input type="checkbox" class="switch-button-checkbox-back" style="visibility: hidden;" id="for-back" /></label>
                            </div>
                    </div>
                    <div class="tab-pane fade pt-3 link2" id="teams" role="tabpanel" aria-labelledby="password-tab">
                        <div class="league">
                            <div class="result">
                                    <ul class="checkbox-design" id="filters">
                                        @foreach($teams as $team)
                                        <li class="{{$team->league}}league" style="display: none;">
                                            <input type="checkbox" value="{{$team->team_id}}player" id="filter-{{$team->team_id}}player" />
                                            <label for="filter-{{$team->team_id}}player">{{$team->name}}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="label-padding">
                                        <label for="for-back1" class="btn btn-back-filter btn-outline-success">Back<input type="checkbox" class="switch-button-checkbox-back-to-leagues" style="visibility: hidden;" id="for-back1" /></label>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($topperformances as $topperformance)
        <div class="{{$topperformance->teams}}player col-12 col-md-6 col-lg-4 mb-3 justify-content-center player-ranking-card" style="display: none;" >
                <div class="wrapper">
                    <!-- *** fut-player-card ***-->
                    <div class="fut-player-card img-fluid">
                        <!-- Player Card Top-->
                        <div class="player-card-top">
                            <div class="player-master-info">
                                <div class="player-rating">
                                    <span>{{$topperformance->rank}}</span>
                                </div>
                                <div class="player-position">
                                    <span>{{$topperformance->position}}</span>
                                </div>
                                {{--
                                <div class="player-nation"><img src="https://selimdoyranli.com/cdn/fut-player-card/img/argentina.svg" alt="Argentina" draggable="false" /></div> --}}
                                <div class="player-club"><img src="{{$topperformance->logo}}" alt="Barcelona" draggable="false" /></div>
                            </div>
                            <div class="player-picture"><img src="{{$topperformance->photo}}" alt="Messi" draggable="false" />
                                <div class="player-extra"><span>Age {{$topperformance->age}} &nbsp;&nbsp; H {{$topperformance->height}}"</span></div>
                            </div>
                        </div>
                        <div class="player-card-bottom">
                            <div class="player-info2">
                                <!-- Player Name-->
                                <div class="player-name"><span><a style="text-decoration:none;" style="color: black;" href="{{URL::route('frontend.user.show', $topperformance->player_id)}}">{{$topperformance->firstname }}</a></span></div>
                                <!-- Player Features-->
                                <div class="player-features">
                                    <div class="player-features-col"><span>
                                        <div class="player-feature-value">{{$topperformance->total_goals}}</div>
                                        <div class="player-feature-title">GOALS</div></span><span>
                                        <div class="player-feature-value">{{$topperformance->total_shots}}</div>
                                        <div class="player-feature-title">SHO</div></span><span>
                                        <div class="player-feature-value">{{$topperformance->total_passes}}</div>
                                        <div class="player-feature-title">PAS</div></span>
                                    </div>
                                    <div class="player-features-col"><span>
                                        <div class="player-feature-value">{{$topperformance->attempts_dribbles}}</div>
                                        <div class="player-feature-title">DRI</div></span><span>
                                        <div class="player-feature-value">{{$topperformance->total_duels}}</div>
                                        <div class="player-feature-title">DU</div></span><span>
                                        <div class="player-feature-value">{{$topperformance->minutes}}</div>
                                        <div class="player-feature-title">MIN</div></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!--container-->
@endsection
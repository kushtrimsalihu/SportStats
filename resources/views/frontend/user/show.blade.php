@extends('frontend.layouts.app')


@section('title', __('Dashboard'))

@section('content')

    <div class="container-dash">
        <div class="row row-height">
        <div class="col-12 col-lg-6 mb-4 ">
            <div class="player-info shad">
                <div class="player-img">
                    <img class="img-fluid" src="{{$playershow->photo}}" alt="">
                </div>
                <div class="player-data ms-3 m-lg-auto ">
                    <h4 class="fw-bold text-center text_change">{{$playershow->firstname}} {{$playershow->lastname}}</h4>
                    <h6 class="team_name">{{$playershow->name}}</h6>
                    <ul>
                        <li>Age: {{$playershow->age}}</li>
                        <li>{{$playershow->nationality}}</li>
                        <li>Height: {{$playershow->height}}</li>
                        <li>Place: {{$playershow->place}}</li>
                        <li>Position: {{$playershow->position}}</li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 team-card mb-3 d-none d-md-block ">
            <div class="player-team-info flex-column-team text-center shad">
                <h5>Current team:</h5>
                <div class="team-im">
                    <img class="img-fluid team-img" src="{{$playershow->logo}}" alt="">
                </div>
                <h5>{{$playershow->name}}</h5>
            </div>

        </div>
        {{-- Small screen --}}
        <div class="col-12 team-card mb-3 d-block d-md-none ">
            <div class="player-team-info-sm  text-center shad">
                <h5>Current team:</h5>
                <div class="team-im">
                    <img class="img-fluid team-img-sm" src="{{$playershow->logo}}" alt="">
                </div>
                <h5>{{$playershow->name}}</h5>
            </div>
        </div>

        <div class="col-6 col-lg-3 mb-3 d-none d-md-block">
            <div class="player-info-rank d-block shad">
                <h5 >#Ranking ({{$playershow->position}})</h5>
                <div class="width-ranking">
                <h1 class="rank-font">{{$playershow->rank}}</h1>
                </div>
            </div>
        </div>
        {{-- Small screen --}}
        <div class="col-12 mb-3 d-block d-md-none">
            <div class="player-info-rank-sm shad remove-media">
                <h5 class="ranking">#Ranking</h5>
                <h1 class="rank-font-sm">{{$playershow->rank}}</h1>
            </div>
        </div>
        <div class="col-12 col-lg-3 ">
            <table class="table table-stats shad mb-4">
                <div class="b-skills piechart-box piechart-box-shad">
                    <div class="skill-item center-block">
                        <div class="chart-container">
                            @if($statistics->on_shots == 0)
                            <div class="chart " data-percent="0" data-bar-color="#23afc3">
                                <span class="percent" data-after="%">Undefined</span>
                            </div>
                        @else
                            <div class="chart " data-percent="{{($statistics->on_shots/$statistics->total_shots)*100}}" data-bar-color="#20D489">
                                <span class="percent" data-after="%">{{($statistics->on_shots/$statistics->total_shots)*100}}</span>
                            </div>
                            @endif
                        </div>
                        <p>ON TARGET</p>
                    </div>
                </div>
                <tbody>
                    <div class='table-title-stats'>Shots </div>
                    <tr>
                    <th>Total</th>
                    <th>on</th>
                    </tr>
                    <tr>
                    <td>{{$statistics->total_shots}}</td>
                    <td>{{$statistics->on_shots}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-lg-3 mb-md-2">
            <table class="table table-stats shad mb-4">
                <div class="b-skills piechart-box piechart-box-shad">
                    <div class="skill-item center-block">
                        <div class="chart-container">
                            @if($statistics->won_duels == 0)
                            <div class="chart " data-percent="0" data-bar-color="#23afc3">
                                <span class="percent" data-after="%">Undefined</span>
                            </div>
                        @else
                            <div class="chart" data-percent="{{($statistics->won_duels/$statistics->total_duels)*100}}" data-bar-color="#20D489">
                                <span class="percent" data-after="%">{{($statistics->won_duels/$statistics->total_duels)*100}}</span>
                            </div>
                            @endif
                        </div>
                        <p>WON DUELS</p>
                    </div>
                </div>
                <tbody>
                    <div class='table-title-stats'> Duels </div>
                    <tr>
                        <th>Total</th>
                        <th>Won</th>
                    </tr>
                     <tr>
                        <td>{{$statistics->total_duels}}</td>
                        <td>{{$statistics->won_duels}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-lg-6">
            <table class="table table-stats shad mb-4">
                <div class="b-skills piechart-box piechart-box-shad">
                    <div class="skill-item center-block">
                        <div class="chart-container">
                            @if($statistics->conceded_goals == 0)
                            <div class="chart " data-percent="0" data-bar-color="#23afc3">
                                <span class="percent" data-after="%">Undefined</span>
                            </div>
                        @else
                            <div class="chart " data-percent="{{($statistics->conceded_goals/$statistics->total_goals)*100}}" data-bar-color="#20D489">
                                <span class="percent" data-after="%">{{($statistics->conceded_goals/$statistics->total_goals)*100}}</span>
                            </div>
                            @endif
                        </div>
                        <p>CONCEDED GOALS</p>
                    </div>
                </div>
                <tbody>
                    <div class='table-title-stats'> Goals </div>
                    <tr>
                        <th>Total</th>
                        <th>Conceded</th>
                        <th>Assists</th>
                        <th>Saves</th>
                    </tr>
                    <tr>
                        <td>{{$statistics->total_goals}} <i class="far fa-futbol"></i></td>
                        <td>{{$statistics->conceded_goals}}</td>
                        <td>{{$statistics->assists_goals}}</td>
                        <td>{{$statistics->saves_goals}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-lg-3">
            <table class="table table-stats shad mb-4">
                <div class="b-skills piechart-box piechart-box-shad">
                    <div class="skill-item center-block">
                        <div class="chart-container">
                            @if($statistics->committed_fouls == 0)
                            <div class="chart " data-percent="0" data-bar-color="#23afc3">
                                <span class="percent" data-after="%">Undefined</span>
                            </div>
                        @else
                            <div class="chart " data-percent="{{($statistics->committed_fouls/$statistics->drawn_fouls)*100}}" data-bar-color="#20D489">
                                <span class="percent" data-after="%">{{($statistics->committed_fouls/$statistics->drawn_fouls)*100}}</span>
                            </div>
                            @endif
                        </div>
                        <p>COMMITTED FOULS</p>
                    </div>
                </div>
                <tbody>
                    <div class='table-title-stats'> Fouls </div>
                    <tr>
                        <th>Drawn</th>
                        <th>Committed</th>
                    </tr>
                     <tr>
                        <td>{{$statistics->drawn_fouls}}</td>
                        <td>{{$statistics->committed_fouls}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-lg-3">
            <table class="table table-stats shad mb-4">
                <div class="b-skills piechart-box piechart-box-shad">
                    <div class="skill-item center-block">
                        <div class="chart-container">
                            @if($statistics->yellow_cards == 0)
                            <div class="chart " data-percent="0" data-bar-color="#23afc3">
                                <span class="percent" data-after="%">Undefined</span>
                            </div>
                        @else
                            <div class="chart " data-percent="{{$statistics->yellow_cards/($statistics->yellow_cards+$statistics->red_cards)*100}}" data-bar-color="#20D489">
                                <span class="percent" data-after="%">{{$statistics->yellow_cards/($statistics->yellow_cards+$statistics->red_cards)*100}}</span>
                            </div>
                            @endif
                        </div>
                        <p>YELLOW CARDS</p>
                    </div>
                </div>
                <tbody>
                    <div class='table-title-stats'> Cards </div>
                    <tr>
                        <th>Yellow <i class="fas yellow-card fa-copy"></th>
                        <th>Red <i class="fas red-card fa-copy"></i></th>
                    </tr>
                     <tr>
                        <td>{{$statistics->yellow_cards}}</td>
                        <td>{{$statistics->red_cards}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-lg-6">
            <table class="table table-stats shad mb-4">
                <div class="b-skills piechart-box piechart-box-shad">
                    <div class="skill-item center-block">
                        <div class="chart-container ">
                            @if($statistics->key_passes == 0)
                            <div class="chart " data-percent="0" data-bar-color="#23afc3">
                                <span class="percent" data-after="%">Undefined</span>
                            </div>
                        @else
                            <div class="chart " data-percent="{{($statistics->key_passes/$statistics->total_passes)*100}}" data-bar-color="#20D489">
                                <span class="percent " data-after="%">{{($statistics->key_passes/$statistics->total_passes)*100}}</span>
                            </div>
                            @endif
                        </div>
                        <p>KEY PASSES</p>
                    </div>
                </div>
                <tbody>
                    <div class='table-title-stats'> Passes </div>
                    <tr>
                        <th>Total</th>
                        <th>Key</th>
                        <th>Accuracy</th>
                    </tr>
                    <tr>
                        <td>{{$statistics->total_passes}}</td>
                        <td>{{$statistics->key_passes}}</td>
                        <td>{{$statistics->accuracy_passes}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        </div><!-- Row-->
        <hr>
        <h3 class="text-center text-black-50 mb-4">-Posts-</h3>
        <div class="row">
            @foreach($posts as $post)
            <div class="col col-sm-12 col-xl-4 mb-4">
                <div class="card h-100">
                    <a href="{{ route('frontend.postshow', $post->id) }}" class="text-decoration-none text-body">
                        <img class="card-img-top" src="{{asset('/postuploads/PostsImages/'.$post->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">{{ $post->title }}</h3>
                            <p class="card-text">{!! substr($post->content, 0, 200) !!}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div><!--container-->
@endsection

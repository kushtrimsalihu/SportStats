@extends('frontend.layouts.app')

@section('title', __('Dashboard'))
@section('content')
    {{-- @include('frontend.includes.sidebar') --}}
    <div class="container-dash">
        @if (isset($team1) && isset($team2))
            @if (isset($voted))
                <div class="row flex-column p-4 mb-4">
                    <div class="d-flex justify-content-center">
                        <h2 class="text-dark">Voting Results</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="d-flex">
                            <div class="d-flex p-4">
                                <h5 class="align-self-center text-uppercase">{{ $votedteam1 }}%</h5>
                            </div>
                            <div class="d-inline-flex">
                                <img src="{{ $team1->logo }}" alt="">
                            </div>
                        </div>
                        <div class="d-inline-flex align-self-center m-4">
                            -
                        </div>
                        <div class="d-flex">
                            <div class="d-inline-flex">
                                <img src="{{ $team2->logo }}" alt="">
                            </div>
                            <div class="d-flex p-4">
                                <h5 class="align-self-center text-uppercase">{{ $votedteam2 }}%</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row flex-column p-4 mb-4">
                    <div class="d-flex justify-content-center">
                        <h2 class="text-dark">Vote Below</h2>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="tex-secondary">Vote to choose the team of the day</p>
                    </div>
                    <div class="row justify-content-center">
                        <a href="{{ route('frontend.user.vote', $team1->team_id) }}"
                            class="text-decoration-none daily-transition">
                            <div class="d-flex">
                                <div class="d-flex p-4">
                                    <h5 class="align-self-center text-uppercase">Vote</h5>
                                </div>
                                <div class="d-inline-flex">
                                    <img src="{{ $team1->logo }}" alt="">
                                </div>
                            </div>
                        </a>
                        <div class="d-inline-flex align-self-center m-4">
                            -
                        </div>
                        <a href="{{ route('frontend.user.vote', $team2->team_id) }}"
                            class="text-decoration-none daily-transition">
                            <div class="d-flex">
                                <div class="d-inline-flex">
                                    <img src="{{ $team2->logo }}" alt="">
                                </div>
                                <div class="d-flex p-4">
                                    <h5 class="align-self-center text-uppercase">Vote</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
        @endif
        <div class="col-12 mt-4">
            <div class="row dashboard-box shad">
                <div class="col-md-6 text-cart-dash order-2 order-md-1">
                    <div class="middle-text header-text p-4">
                        <h1>Main Ranking</h1>
                        <div class="text-left mt-4">
                            <h3>Attacker</h3>
                            <h3>Midfielder</h3>
                            <h3>Defender</h3>
                        </div>
                        <a class="btn btn-cart btn-lg btn-success mt-4"
                            href="{{ URL::route('frontend.user.ranking') }}">View main ranking</a>

                    </div>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <img class="img-fluid img-fan" src="{{ asset('/images/mapgreen.png/') }}">
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="row dashboard-box-green shad">
                <div class="col-md-6 text-cart-dash order-2">
                    <div class="middle-text league-text p-4">
                        <h1>Live Score</h4>
                            <div class="text-left mt-4">
                                <h3>Champion league</h3>
                                <h3>Premier league</h3>
                                <h3>La Liga</h3>
                            </div>
                            <a class="btn btn-cart btn-lg btn-success mt-4"
                                href="{{ URL::route('frontend.user.livescore') }}">View LiveScore</a>
                    </div>
                </div>
                <div class="col-md-6 order-1">
                    <img class="img-fluid img-fan" src="{{ asset('/images/livescore.png/') }}">
                </div>
            </div>
        </div>
        <div class="col-12  mt-4">
            <div class="row dashboard-box shad">
                <div class="col-md-6 text-cart-dash order-2 order-md-1">
                    <div class="middle-text header-text p-4">
                        <h1>Compare Teams</h1>
                        <div class="text-left mt-4">
                            <h3>Liverpool</h3>
                            <h3>Real Madrid</h3>
                            <h3>Barcelona</h3>
                        </div>
                        <a class="btn btn-cart btn-lg btn-success mt-4"
                            href="{{ URL::route('frontend.user.compareteams') }}">Compare Teams</a>

                    </div>
                </div>
                <div class="col-md-6 order-1 order-md-2 img_responsive">
                    <img class="img-fluid img-fan"
                        src="{{asset('/images/compare_teams.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="row dashboard-box-green shad">
                <div class="col-md-6 text-cart-dash order-2">
                    <div class="middle-text league-text p-4">
                        <h1>Compare Players</h4>
                            <div class="text-left mt-4">
                                <h3>Cristiano Ronaldo</h3>
                                <h3>Lionel Messi</h3>
                                <h3>Kylian Mbappé</h3>
                            </div>
                            <a class="btn btn-cart btn-lg btn-success mt-4"
                                href="{{ URL::route('frontend.user.compareplayers') }}">Compare players</a>
                    </div>
                </div>
                <div class="col-md-6 order-1">
                    <img class="img-fluid img-fan" src="{{ asset('/images/compare_players.png/') }}">
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="row dashboard-box shad">
                <div class="col-md-6 text-cart-dash order-2 order-md-1">
                    <div class="middle-text header-text p-4">
                        <h1>Search Players/Filter</h4>
                            <div class="text-left mt-4">
                                <h3>By Country</h3>
                                <h3>By League</h3>
                                <h3>By Team</h3>
                            </div>
                            <a class="btn btn-cart btn-lg btn-success mt-4"
                                href="{{ URL::route('frontend.user.filters') }}">Search Players</a>
                    </div>
                </div>
                <div class="col-md-6 img_responsive order-1 order-md-2">
                    <img class="img-fluid img-fan" src="{{ asset('/images/search_players.png/') }}">
                </div>
            </div>
        </div>
    </div>
    <!--container-->
@endsection

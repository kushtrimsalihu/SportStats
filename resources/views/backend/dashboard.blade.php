@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="content-admin-dashboard card border-0">
        <div>
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card shadow admin-cards">
                                    <div class="card-body">
                                        <div class="row h-100">
                                            <div class="col col-xl-6 order-xl-12 d-flex align-items-center justify-content-center">
                                                <img src="{{URL::asset('/images/users.png')}}" alt="" class="admin-dashboard-card-image">
                                            </div>
                                            <div class="col-12 col-md-6 d-flex align-items-center">
                                                <div class="p-4 admin-dashboard-card-text-center">
                                                    <h1 class="mb-4 font-weight-bold">Users</h1>
                                                    <p class="admin-dashboard-card-text mb-4">This application has {{$totalusers}} users click on the button below to send you to the list of users</p>
                                                    <a href="{{ route('admin.auth.user.index') }}" class="btn btn-cart btn-lg admin-buttons-type-1">Go to users</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="card shadow admin-cards admin-card-type-2">
                                    <div class="card-body">
                                        <div class="row h-100">
                                            <div class="col col-xl-6 order-xl-12 d-flex align-items-center justify-content-center">
                                                <img src="{{URL::asset('/images/admin.png')}}" alt="" class="admin-dashboard-card-image">
                                            </div>
                                            <div class="col-12 col-md-6 d-flex align-items-center">
                                                <div class="p-4 admin-dashboard-card-text-center">
                                                    <h1 class="mb-4 font-weight-bold">Admins</h1>
                                                    <p class="admin-dashboard-card-text-1 mb-4">This application has {{$totaladmins}} admins click on the button below to send you to the list of admins</p>
                                                    <a href="{{ route('admin.auth.user.index','?filters[type]=admin') }}" class="btn btn-cart btn-lg admin-buttons-type-2">Go to admins</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="card shadow admin-cards">
                                    <div class="card-body">
                                        <div class="row h-100">
                                            <div class="col col-xl-6 order-xl-12 d-flex align-items-center justify-content-center">
                                                <img src="{{URL::asset('/images/players.png')}}" alt="" class="admin-dashboard-card-image">
                                            </div>
                                            <div class="col-12 col-md-6 d-flex align-items-center">
                                                <div class="p-4 admin-dashboard-card-text-center">
                                                    <h1 class="mb-4 font-weight-bold">Players</h1>
                                                    <p class="admin-dashboard-card-text mb-4">This application has {{$totalplayers}} players click on the button below to send you to the list of players</p>
                                                    <a href="{{ route('admin.auth.players.index') }}" class="btn btn-cart btn-lg admin-buttons-type-1">Go to players</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="card shadow admin-cards admin-card-type-2">
                                    <div class="card-body">
                                        <div class="row h-100">
                                            <div class="col col-xl-6 order-xl-12 d-flex align-items-center justify-content-center">
                                                <img src="{{URL::asset('/images/statistics.png')}}" alt="" class="admin-dashboard-card-image">
                                            </div>
                                            <div class="col-12 col-md-6 d-flex align-items-center">
                                                <div class="p-4 admin-dashboard-card-text-center">
                                                    <h1 class="mb-4 font-weight-bold">Player statistics</h1>
                                                    <p class="admin-dashboard-card-text-1 mb-4">This application has {{$totalstatistics}} players statistic click on the button below to send you to the list of players statistic</p>
                                                    <a href="{{ route('admin.auth.statistics.index') }}" class="btn btn-cart btn-lg admin-buttons-type-2">Go to statistics</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card shadow admin-cards h-100">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Top Performances</h5>
                                        <table class="table">
                                            <tr>
                                                <th>Firstname</th>
                                                <th>League Name</th>
                                                <th>Total Goals</th>
                                            </tr>
                                            @foreach($topperformances as $topperformance)
                                            <tr>
                                                <td>{{ $topperformance->firstname }}</td>
                                                <td>{{ $topperformance->name }}</td>
                                                <td>{{ $topperformance->total_goals }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="card shadow admin-cards h-100">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">New Users</h5>
                                        <table class="table">
                                            <tr>
                                                <th>Firstname</th>
                                                <th>Surname</th>
                                                <th>Email</th>
                                            </tr>
                                            @foreach($newusers as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->surname }}</td>
                                                <td class="text-break">{{ $user->email }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row h-100">
                            <div class="col mb-4">
                                <div class="card shadow admin-cards text-center h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Data management</h5>
                                        <ul class="list-group">
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.user.index') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            Users
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $totalusers }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.user.deactivated') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            Deactiviated Users
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $deactiviatedusers }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.user.deleted') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            Deleted Users
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $deletedusers }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.players.index') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            Players
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $totalplayers }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.league.index') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            League
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $totalleague }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.sports.index') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            Sports
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $totalsports }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.teams.index') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            Teams
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $totalteams }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.position.index') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            Positions
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $totalpositions }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            <a class="text-decoration-none text-reset" href="{{ route('admin.auth.statistics.index') }}">
                                                <li class="list-group-item list-group-item-action border-right-0 border-left-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            Statistics
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="badge badge-success badge-pill">{{ $totalstatistics }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            
                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
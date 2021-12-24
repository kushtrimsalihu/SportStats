@extends('backend.layouts.app')

@section('title', __('LiveScore'))
@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<x-backend.card>
    <x-slot name="header">
       Livescore Management
    </x-slot>

    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
           <x-utils.link
            icon="c-icon cil-chevron-circle-up-alt"
            class="card-header-action"
            :href="route('admin.auth.livescore.updateLivescore')"
            :text="__('Update Livescore')"
        />
        <x-utils.link
            icon="c-icon cil-reload"
            class="card-header-action"
            :href="route('admin.auth.livescore.addLivescore')"
            :text="__('Refresh Livescore')"
        />
    </x-slot>
@endif

    <x-slot name="body">
        <div class="container-dash">
            <h3 class="title_live">Live </h3>
            <div class="col-12">
                <div class="row ">
                    <div class="col-md-12 text-cart-dash">
                        <div class="middle-text header-text">
                            @forelse(\App\Domains\Auth\Models\Livescore::all() as $detail)
    
                                <div class="livescore-box shadows">
                                    <h3 class="league_name"><i class="far fa-futbol"></i> Football League :
                                        {{ $detail->league_name_sdn }}</h3><br>
    
                                    @if ($detail->team1_goal_tr1 == 'undefined' ?? null)
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                <img src="{{ asset($detail->team1_t1_img) }}" class="img_flags"
                                                    width="40px" height="40px">
                                                <h3 class="team_name"> {{ $detail->team1_name_nm }}</h3>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 goals_center">
                                                <h3 class="results_goal">{{ $detail->team1_goal_tr1 ?? null }} :
                                                    {{ $detail->team2_goal_tr2 }}</h3>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 responsive_images">
                                                <img src="{{ asset($detail->team2_t2_img) }}" class="img_flags"
                                                    width="40px" height="40px">
                                                <h3 class="team_name">{{ $detail->team2_name_nm }}</h3>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                <img src="{{ asset($detail->team1_t1_img) }}" class="img_flags"
                                                    width="40px" height="40px">
                                                <h3 class="team_name"> {{ $detail->team1_name_nm }}</h3>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 goals_center">
                                                <h3 class="results_goal">{{ $detail->team1_goal_tr1 ?? null }} :
                                                    {{ $detail->team2_goal_tr2 }}</h3>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 responsive_images">
                                                <img src="{{ asset($detail->team2_t2_img) }}" class="img_flags"
                                                    width="40px" height="40px">
                                                <h3 class="team_name">{{ $detail->team2_name_nm }}</h3>
                                            </div>
                                        </div>
                                    @endif
    
    
                                </div>
                            @empty
                                <div class=" alert alert-info">There are no live games currently in progress.</div>
                            @endforelse
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-backend.card> 
@endsection




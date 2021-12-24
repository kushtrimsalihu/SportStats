
@extends('backend.layouts.app')

@section('title', __('Create Statistics'))

@section('content')

<x-forms.post :action="route('admin.auth.statistics.store')">
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Statistics')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.statistics.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Select Player</label>
                    <div class="col-md-10">
                        <select name="player" class="form-control" required x-on:change="userType = $event.target.value">
                            @foreach ($players as $player)
                            <option value="{{$player->player_id }}">{{$player->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Matches Played</label>

                    <div class="col-md-10">
                        <input type="text" name="matches_played" class="form-control" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Goals</label>

                    <div class="col-md-10">
                        <input type="text" name="goals" class="form-control" maxlength="100" required />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Assists</label>

                    <div class="col-md-10">
                        <input type="text" name="assists" class="form-control" maxlength="100" required />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Yellow Cards</label>

                    <div class="col-md-10">
                        <input type="text" name="yellow_cards" class="form-control" maxlength="100" required />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Red Cards</label>

                    <div class="col-md-10">
                        <input type="text" name="red_cards" class="form-control" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">From Date</label>

                    <div class="col-md-10">
                        <input type="date" name="from_date" class="form-control" maxlength="100" required />
                    </div>
                </div><!--form-group-->
                
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">To Date</label>

                    <div class="col-md-10">
                        <input type="date" name="to_date" class="form-control" maxlength="100" required />
                    </div>
                </div><!--form-group-->
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
    
@endsection
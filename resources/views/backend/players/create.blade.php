@extends('backend.layouts.app')

@section('title', __('Create Player'))

@section('content')
<x-forms.post :action="route('admin.auth.players.store')" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.players.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                 <div class="form-group row">
                        <label for="player_id" class="col-md-2 col-form-label">@lang('Player_ID')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="player_id" class="form-control" placeholder="{{ __('Player_ID') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="firstname" class="col-md-2 col-form-label">@lang('Name')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="firstname" class="form-control" placeholder="{{ __('Name') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-md-2 col-form-label">@lang('Surname')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="lastname" class="form-control" placeholder="{{ __('Surname') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-md-2 col-form-label">@lang('Age')</label>
                        
                        <div class="col-md-10">
                            <input type="number" name="age" class="form-control" placeholder="{{ __('Age') }}" value="" required max="100" min="0"/>
                        </div>
                    </div>
                    
                    {{-- <div class="form-group row">
                        <label for="gender" class="col-md-2 col-form-label">@lang('Gender')</label>
                        
                        <div class="col-md-10">
                            <select name="gender" class="form-control" required x-on:change="gender = $event.target.value">
                                <option value="Male">@lang('Male')</option>
                                <option value="Female">@lang('Female')</option>
                            </select>
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="height" class="col-md-2 col-form-label">@lang('Height')</label>
                        
                        <div class="col-md-10">
                            <input type="decimal" name="height" class="form-control" placeholder="{{ __('Height') }}" value="" required min="0" max="300"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nationality" class="col-md-2 col-form-label">@lang('Nationality')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="nationality" class="form-control" placeholder="{{ __('Nationality') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="place" class="col-md-2 col-form-label">@lang('Place')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="place" class="form-control" placeholder="{{ __('Place') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="team_id" class="col-md-2 col-form-label">@lang('Team')</label>
                        
                    <div class="col-md-10">
                            <input type="text" name="team_id" class="form-control" placeholder="{{ __('Team') }}" value="" maxlength="100" required />
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Sport')</label>

                        <div class="col-md-10">
                            <select name="sport" class="form-control" required x-on:change="sport = $event.target.value">
                                @foreach($sports as $sport)
                                    <option value="{{ $sport->sports_id }}">{{ $sport->sport_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Position')</label>

                        <div class="col-md-10">
                            <select name="position" class="form-control" required x-on:change="position = $event.target.value">
                                @foreach($positions as $position)
                                    <option value="{{ $position->position_id }}">{{ $position->position_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Team')</label>

                        <div class="col-md-10">
                            <select name="team" class="form-control" required x-on:change="team = $event.target.value">
                                @foreach($teams as $team)
                                    <option value="{{ $team->teams_id }}">{{ $team->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row">
                        <label for="about_player" class="col-md-2 col-form-label">@lang('About Player')</label>

                        <div class="col-md-10">
                            <input type="text" name="about_player" class="form-control" placeholder="{{ __('About Player') }}" value="" required />
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="statistics" class="col-md-2 col-form-label">@lang('Image')</label>

                        <div class="col-md-10">
                            <input type="text" name="photo" class="form-control" placeholder="{{ __('Image Link') }}" value="" required />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Player')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
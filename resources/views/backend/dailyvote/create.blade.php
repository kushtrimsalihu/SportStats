@extends('backend.layouts.app')

@section('title', __('Create Voting'))

@section('content')
<x-forms.post :action="route('admin.auth.dailyvote.store')" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Voting')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.dailyvote.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">@lang('Team')</label>
                <div class="col-md-10">
                    <select name="team1" class="form-control" required x-on:change="sport = $event.target.value">
                        @foreach($teams as $team)
                            <option value="{{ $team->team_id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">@lang('Team')</label>
                <div class="col-md-10">
                    <select name="team2" class="form-control" required x-on:change="sport = $event.target.value">
                        @foreach($teams as $team)
                            <option value="{{ $team->team_id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Voting')</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
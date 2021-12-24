@extends('backend.layouts.app')

@section('title', __('Create Teams'))

@section('content')

<x-forms.post :action="route('admin.auth.teams.store')">
    @csrf
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Teams')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.teams.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Team ID</label>
                <div class="col-md-10">
                    <input type="number" name="team_id" class="form-control" minlength="2000" required />
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Country</label>
                <div class="col-md-10">
                    <input type="text" name="country" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Team Name</label>
                <div class="col-md-10">
                    <input type="text" name="name" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Founded</label>
                <div class="col-md-10">
                    <input type="text" name="founded" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">National</label>
                <div class="col-md-10">
                    <input type="text" name="national" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Logo</label>
                <div class="col-md-10">
                    <input type="text" name="logo" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Select League</label>
                <div class="col-md-10">
                    <select name="league" class="form-control" required x-on:change="userType = $event.target.value">
                    @foreach ($league as $leagu)
                        <option value="{{$leagu->id }}">{{$leagu->name}}</option>
                    @endforeach
                    </select>
                </div><!--form-group-->
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection


{{--<x-slot name="body">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Select League</label>
    <div class="col-md-10">
    <select name="league" class="form-control" required x-on:change="userType = $event.target.value">
        @foreach ($league as $leagu)
        <option value="{{$leagu->id }}">{{$leagu->name}}</option>
        @endforeach
    </select>
--}}

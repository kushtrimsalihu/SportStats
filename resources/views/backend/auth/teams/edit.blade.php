@extends('backend.layouts.app')

@section('title', __('Edit Teams'))

@section('content')

<h1 class="text-center">Edit Teams</h1>
<x-forms.post :action="route('admin.auth.teams.update', $teams->team_id)" enctype="multipart/form-data">
    {{method_field('patch')}}
    @csrf
    <x-backend.card>
        <x-slot name="header">
            @lang('Edit Teams')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.teams.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">

            <div class="form-group">
                <label for="name" class="form-label">Teams Name</label>
                <input type="text" value="{{$teams->name}}" name="name" class="form-control" maxlength="100" required />
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Country</label>
                <input type="text" value="{{$teams->country}}" name="country" class="form-control" maxlength="100" required />
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Logo link</label>
                <input type="text" value="{{$teams->logo}}" name="logo" class="form-control" maxlength="100" required />
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Team Founded</label>
                <input type="text" value="{{$teams->founded}}" name="founded" class="form-control"  required />
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Team National</label>
                <input type="text" value="{{$teams->national}}" name="national" class="form-control"  required/>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Select League</label>
                <div class="col-md-10">
                    <select name="league" class="form-control" required x-on:change="userType = $event.target.value">
                        @foreach ($league as $leagu)
                        <option value="{{$leagu->id }}">{{$leagu->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection

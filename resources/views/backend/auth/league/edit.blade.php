
@extends('backend.layouts.app')

@section('title', __('Edit League'))

@section('content')

<h1 class="text-center">Edit League</h1>
<x-forms.post :action="route('admin.auth.league.update', $league->id)" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Edit League')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.league.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                <label for="name" class="form-label">Country</label>
                <input type="text" value="{{$league->country}}" name="country" class="form-control" maxlength="100" required />
            </div>
            <div class="form-group">
                <label for="name" class="form-label">League Name</label>
                <input type="text" value="{{$league->name}}" name="name" class="form-control" maxlength="100" required />
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Logo link</label>
                <input type="text" value="{{$league->logo}}" name="logo" class="form-control" maxlength="100" required />
            </div>
            <div class="form-group">
                <label for="name" class="form-label">League Type</label>
                <input type="text" value="{{$league->type}}" name="type" class="form-control" maxlength="100" required />
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
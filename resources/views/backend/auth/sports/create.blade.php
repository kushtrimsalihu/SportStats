@extends('backend.layouts.app')

@section('title', __('Create Sport'))

@section('content')

<x-forms.post :action="route('admin.auth.sports.store')">
    @csrf
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Sport')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.league.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                <label for="name" class="form-label">Name: </label>
                <input type="text" name="sport_name" class="form-control" maxlength="100" required placeholder="Sport Name"/>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Type: </label>
                <input type="text" name="type" class="form-control" maxlength="100" required placeholder="Sport Type"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
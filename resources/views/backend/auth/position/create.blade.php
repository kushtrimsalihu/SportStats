@extends('backend.layouts.app')

@section('title', __('Create League'))

@section('content')

<x-forms.post :action="route('admin.auth.position.store')">
    @csrf
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Position')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.position.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                <label for="name" class="col-form-label">Type:</label>
                <input type="text" name="position_type" class="form-control" maxlength="100" required placeholder="Position Name"/>
            </div>
            <div class="form-group">
                <label for="name" class="col-form-label">Sport:</label>
                <select name="sport" class="form-control">
                @foreach ($sports as $sport)
                    <option value="{{ $sport->sports_id }}"> {{ $sport->sport_name }}</option>
                @endforeach
                </select>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
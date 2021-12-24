
@extends('backend.layouts.app')

@section('title', __('Create Sport'))

@section('content')

<h1 class="text-center">Edit Sport</h1>
<x-forms.post :action="route('admin.auth.sports.update', $sports->sports_id)" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Edit Sport')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.sports.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                <label for="name" class="form-label">Sport Name</label>
                <input type="text" value="{{ $sports->sport_name }}" name="sport_name" class="form-control" maxlength="100" required />
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Sport Type</label>
                <input type="text" value="{{ $sports->type }}" name="type" class="form-control" maxlength="100" required />
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
@extends('backend.layouts.app')

@section('title', __('Edit Position'))

@section('content')

<x-forms.post :action="route('admin.auth.position.update', $position->position_id)" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Edit Position')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.position.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Type</label>
                <div class="col-md-10">
                    <input type="text" value="{{$position->position_type}}" name="position_type" class="form-control" maxlength="100" required />
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">@lang('Sport')</label>
                <div class="col-md-10">
                    <select name="sport" class="form-control" required x-on:change="sport = $event.target.value">
                    @foreach($sports as $sport)
                        <option value="{{ $sport->sports_id }}">{{ $sport->sport_name }}</option>
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
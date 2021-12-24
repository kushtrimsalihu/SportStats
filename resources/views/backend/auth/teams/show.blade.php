@extends('backend.layouts.app')

@section('title', __('Teams'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Teams')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.teams.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table">
                <tr>
                    <th>@lang('Image')</th>
                    <td><img width="200px" src="{{$team->logo}}" alt=""></td>
                </tr>
                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $team->name }}</td>
                </tr>
                <tr>
                    <th>@lang('League')</th>
                    <td>{{ $team->league }}</td>
                </tr>

                <tr>
                    <th>@lang('Country')</th>
                    <td>{{ $team->country }}</td>
                </tr>
                <tr>
                    <th>@lang('Founded')</th>
                    <td>{{ $team->founded }}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection

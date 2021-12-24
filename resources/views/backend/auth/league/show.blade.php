@extends('backend.layouts.app')

@section('title', __('League'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View League')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.league.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table">
                <tr>
                    <th>@lang('Image')</th>
                    <td><img width="200px" src="{{$league->logo}}" alt=""></td>
                </tr>
                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $league->name }}</td>
                </tr>
                <tr>
                    <th>@lang('Country')</th>
                    <td>{{ $league->country }}</td>
                </tr>
                <tr>
                    <th>@lang('Type')</th>
                    <td>{{ $league->type }}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
@extends('backend.layouts.app')

@section('title', __('Player'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Player')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.players.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table">
                <tr>
                    <th>@lang('Image')</th>
                    <td><img width="200px" src="{{ $player->photo }}" alt=""></td>
                </tr>
                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $player->firstname }}</td>
                </tr>
                <tr>
                    <th>@lang('Surname')</th>
                    <td>{{ $player->lastname }}</td>
                </tr>
                <tr>
                    <th>@lang('Position')</th>
                    <td>{{ $player->position }}</td>
                </tr>
                <tr>
                    <th>@lang('Age')</th>
                    <td>{{ $player->age }}</td>
                </tr>
                <tr>
                    <th>@lang('Height')</th>
                    <td>{{ $player->height }} cm</td>
                </tr>
                <tr>
                    <th>@lang('Nationality')</th>
                    <td>{{ $player->nationality }} </td>
                </tr>
                <tr>
                    <th>@lang('Place')</th>
                    <td>{{ $player->place }} cm</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
@extends('backend.layouts.app')

@section('title', __('Position'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Position')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.position.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table">
                <tr>
                    <th>@lang('Type')</th>
                    <td>{{ $position->position_type }}</td>
                </tr>
                <tr>
                    <th>@lang('Sport')</th>
                    <td>{{ $position->sports->sport_name }}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
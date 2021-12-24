@extends('backend.layouts.app')

@section('title', __('Sport'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Sport')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.sports.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table">
                <tr>
                    <th>@lang('Sport Name')</th>
                    <td>{{ $sport->sport_name }}</td>
                </tr>
                <tr>
                    <th>@lang('Type')</th>
                    <td>{{ $sport->type }}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
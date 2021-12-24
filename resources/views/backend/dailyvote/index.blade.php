@extends('backend.layouts.app')

@section('title', __('Daily Vote Management'))
@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Daily Vote Management')
    </x-slot>
    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.auth.dailyvote.create')"
            :text="__('Create Voting')"
        />
    </x-slot>
    @if(isset($dailyvote) && count($dailyvote)>0)
    <x-slot name="body">
        <table class="table">
            <th>Id</th>
            <th>Team 1 id</th>
            <th>Team 2 id</th>
            <th>Actions</th>
            @foreach($dailyvote as $daily)
            <tr>
                <td>{{ $daily->id }}</td>
                <td>{{ $daily->team1 }}</td>
                <td>{{ $daily->team2 }}</td>
                <td>
                    <x-utils.view-button
                        :href="route('admin.auth.dailyvote.show', $daily->id)"
                        :text="__('View')" />
                    <x-utils.delete-button
                        :href="route('admin.auth.dailyvote.destroy', $daily->id)"
                        :text="__('Delete')" />
                </td>
            </tr>
            @endforeach
        </table>
    </x-slot>
    @endif
    @endif
</x-backend.card>
@endsection
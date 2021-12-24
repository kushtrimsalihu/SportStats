@extends('backend.layouts.app')

@section('title', __('Logo'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Logo')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.updateinformation.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table">
                <tr>
                    <img src="{{asset('uploads/logo/'.$updateinformation->icon)}}" width="400px" height="400px">
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection

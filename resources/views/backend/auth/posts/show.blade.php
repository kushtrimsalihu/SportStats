@extends('backend.layouts.app')

@section('title', __('Post'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Post')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.posts.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table">
                <tr>
                    <th>@lang('Title')</th>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <th>@lang('Content')</th>
                    <td>{!! $post->content !!}</td>
                </tr>
                <tr>
                    <img src="{{asset('/postuploads/PostsImages/'.$post->image)}}" width="600px" height="300px">
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection

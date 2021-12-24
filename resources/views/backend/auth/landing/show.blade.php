@extends('backend.layouts.app')

@section('title', __('Landing Page'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Landing Page')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.landing.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <div class="table-responsive" >
                <div class="filterable">
                <table class="table table-striped table-bordered" id="table">
                 
                    <tr>
                    <th>@lang('Title')</th>
                    <td>{{ $landing_page->title }}</td>
                </tr>
                <tr>
                    <th>@lang('Description')</th>
                    <td>{{ $landing_page->description }}</td>
                </tr>
                <tr>
                    <th>@lang('Image')</th>
                    <td>  @if ($landing_page->image != null)
                        <img src="{{asset('/uploads/LandingPageImages/'.$landing->image)}}" width="600px" class="image_nav">
                       @elseif($landing_page->image == null)
                       <img src="{{asset('/images/showcase.jpg/')}}" width="600px"  class="image_nav">
                       @endif </td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
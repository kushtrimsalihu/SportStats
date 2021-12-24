@extends('backend.layouts.app')

@section('title', __('Landing Page'))

@section('content')
<x-backend.card>
    <x-slot name="header">
       Landing Page
    </x-slot>
    <x-slot name="body">
        <div class="table-responsive" >
            <div class="filterable">
            <table class="table table-striped table-bordered" id="table">
                <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image Background</th>

                        <th class="text-center">View</th>
                        <th class="text-center">Edit</th>
                </tr>
                @if(count($landing_page) > 0)
                @foreach($landing_page as $landing)
                <tr>
                   
                    <td><input type="hidden" value={{$landing->title}}>{{$landing->title}}</td>
                    <td><input type="hidden" value={{$landing->description}}>{{$landing->description}}</td>
                    <td>
                        @if ($landing->image != null)
         <img src="{{asset('/uploads/LandingPageImages/'.$landing->image)}}" width="100px" class="image_nav">
        @elseif($landing->image == null)
        <img src="{{asset('/images/showcase.jpg/')}}" width="100px"  class="image_nav">
        @endif 
                    </td>
                    <td>
                      <x-utils.view-button
                        :href="route('admin.auth.landing.show', $landing->id)"
                        :text="__('View')" />
                    </td>
                    <td>
                        <x-utils.edit-button :href="route('admin.auth.landing.edit', $landing->id)"
                            :text="__('Edit')" />
                    </td>
                  
                    </td>
                </tr>
                @endforeach
                @else
                <p> No details found </p>
                @endif
            </table>
            </div>
        </div>
    </x-slot>
</x-backend.card>
    @endsection

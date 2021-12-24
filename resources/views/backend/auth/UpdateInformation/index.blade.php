@extends('backend.layouts.app')

@section('title', __('Logo'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        Logo
    </x-slot>
    <x-slot name="body">
        <div class="table-responsive" >
            <div class="filterable">
            <table class="table table-striped table-bordered" id="table">
                <tr>
                        <th>Logo Icon</th>

                        <th class="text-center">View</th>
                        <th class="text-center">Edit</th>
                </tr>
                @if(count($updateinformation) > 0)
                @foreach($updateinformation as $updateinfo)
                <tr>
                    <td>
                               @if ($updateinfo->icon != null)
                            <img src="{{asset('/uploads/logo/'.$updateinfo->icon)}}" width="100px" height="100px" value="{{ old('icon') }}">
                           @elseif($updateinfo->icon == null)
                           <img src="{{asset('/images/logo.png/')}}" width="100px" height="100px" value="{{ old('icon') }}">
                           @endif 


                </td>
                    <td>
                      <x-utils.view-button
                        :href="route('admin.auth.updateinformation.show', $updateinfo->id)"
                        :text="__('View')" />
                    </td>
                    <td>
                        <x-utils.edit-button :href="route('admin.auth.updateinformation.edit', $updateinfo->id)"
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

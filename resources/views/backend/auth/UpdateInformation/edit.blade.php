@extends('backend.layouts.app')

@section('title', __('Edit Logo'))

@section('content')

<h1 class="text-center">Edit Post</h1>
<x-forms.post :action="route('admin.auth.updateinformation.update', $updateinformation->id)" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Edit Logo')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.updateinformation.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">

            <div class="col-md-10">
                <label for="icon" class="form-label">Logo Icon</label>
                <input type="file" name="icon" class="form-control"  />
                <img src="{{asset('/uploads/logo/'.$updateinformation->icon)}}" width="100px" height="60px" alt="" value="{{ old('icon') }}">
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection


@extends('backend.layouts.app')

@section('title', __('Create League'))

@section('content')

<x-forms.post :action="route('admin.auth.league.store')">
    @csrf
    <x-backend.card>
        <x-slot name="header">
            @lang('Create League')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.league.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Country</label>
                <div class="col-md-10">
                    <input type="text" name="country" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">League Name</label>
                <div class="col-md-10">
                    <input type="text" name="name" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">League Type</label>
                <div class="col-md-10">
                    <input type="text" name="type" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Logo</label>
                <div class="col-md-10">
                    <input type="text" name="logo" class="form-control" maxlength="100" required />
                </div>
            </div><!--form-group-->
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
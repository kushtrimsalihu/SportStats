@extends('backend.layouts.app')

@section('title', __('Create League'))

@section('content')

<x-forms.post :action="route('admin.auth.faq.store')">
    @csrf
    <x-backend.card>
        <x-slot name="header">
            @lang('Create FAQ')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.faq.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                <label for="name" class="col-form-label">Question:</label>
                <input type="text" name="questions" class="form-control" maxlength="100"/>
            </div>
            <div class="form-group">
                <label for="name" class="col-form-label">Answer</label>
                <div class="">
                    <textarea type="text" name="answers" class="form-control" > </textarea>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Create</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
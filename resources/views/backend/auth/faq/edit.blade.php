@extends('backend.layouts.app')

@section('title', __('Edit Faq'))

@section('content')

<x-forms.post :action="route('admin.auth.faq.update', $faq->faq_id)" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Edit FAQ')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.faq.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Question</label>
                <div class="col-md-10">
                    <input type="text" value="{{$faq->questions}}" name="questions" class="form-control" required />
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Answer</label>
                <div class="col-md-10">
                    <textarea type="text" value="{{$faq->answers}}" name="answers" class="form-control" required >{{$faq->answers}} </textarea>
                </div>
            </div>
            
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Edit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
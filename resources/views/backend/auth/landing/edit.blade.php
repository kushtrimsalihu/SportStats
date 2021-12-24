@extends('backend.layouts.app')

@section('title', __('Edit Landing Page'))

@section('content')
<x-forms.post :action="route('admin.auth.landing.update',$landing_page->id)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Landing Page')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.landing.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="title" class="form-control" placeholder="{{ __('Title') }}" value="{{ $landing_page->title }}" maxlength="100"  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>
                        
                        <div class="col-md-10">
                            <textarea name="description" class="form-control" placeholder="{{ __('Description') }}" value="{{ $landing_page->description }}" maxlength="400"  rows="4" cols="100" >{{ $landing_page->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>
                        
                        <div class="col-md-10">
                            <input type="file" name="image" class="form-control" id="img_bg" placeholder="{{ __('Image') }}" value="{{$landing_page->image }}"  />
                            <img src="{{asset('/uploads/LandingPageImages/images/'.$landing_page->image)}}" width="100px" alt="">
                            
                        </div>
                    </div>

                </x-slot>

                <x-slot name="footer">
                    <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Edit Landing Page')</button>
                </x-slot>
            </x-backend.card>
        </x-forms.post>
    @endsection
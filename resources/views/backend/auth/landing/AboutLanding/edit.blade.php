@extends('backend.layouts.app')

@section('title', __('Edit Landing Page'))

@section('content')
<x-forms.post :action="route('admin.auth.aboutlanding.update',$landing_page_about->id)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Landing Page')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.aboutlanding.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="title_aboutus" class="col-md-2 col-form-label">@lang('About Us Title')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="title_aboutus" class="form-control" placeholder="{{ __('Abous Us') }}" value="{{ $landing_page_about->title_aboutus }}" maxlength="100"  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description_aboutus" class="col-md-2 col-form-label">@lang('Description 1')</label>

                        <div class="col-md-10">
                            <textarea name="description_aboutus" class="form-control"
                                placeholder="{{ __('About Description') }}"
                                value="{{ $landing_page_about->description_aboutus }}" maxlength="400" rows="4"
                                cols="100">{{ $landing_page_about->description_aboutus }}</textarea>
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label for="title_cards" class="col-md-2 col-form-label">@lang('Title 1')</label>

                        <div class="col-md-10">
                            <input type="text" name="title_cards" class="form-control" 
                                value="{{ $landing_page_about->title_cards }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_cards" class="col-md-2 col-form-label">@lang('Description 1')</label>

                        <div class="col-md-10">
                            <textarea name="description_cards" class="form-control"
                                placeholder="{{ __('Description ...') }}"
                                value="{{ $landing_page_about->description_cards }}" maxlength="400" rows="4"
                                cols="100">{{ $landing_page_about->description2_cards }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title2_cards" class="col-md-2 col-form-label">@lang('Title 2')</label>

                        <div class="col-md-10">
                            <input type="text" name="title2_cards" class="form-control"
                                value="{{ $landing_page_about->title2_cards }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description2_cards" class="col-md-2 col-form-label">@lang('Description 2')</label>

                        <div class="col-md-10">
                            <textarea name="description2_cards" class="form-control"
                                value="{{ $landing_page_about->description2_cards }}" maxlength="400" rows="4"
                                cols="100">{{ $landing_page_about->description2_cards }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title3_cards" class="col-md-2 col-form-label">@lang('Title 3')</label>

                        <div class="col-md-10">
                            <input type="text" name="title3_cards" class="form-control"
                                value="{{ $landing_page_about->title3_cards }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description3_cards" class="col-md-2 col-form-label">@lang('Description 3')</label>

                        <div class="col-md-10">
                            <textarea name="description3_cards" class="form-control"
                                value="{{ $landing_page_about->description3_cards }}" maxlength="400" rows="4"
                                cols="100">{{ $landing_page_about->description3_cards }}</textarea>
                        </div>
                    </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Edit Landing Page')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

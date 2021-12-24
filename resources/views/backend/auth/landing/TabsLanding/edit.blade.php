@extends('backend.layouts.app')

@section('title', __('Edit Landing Page'))

@section('content')
<x-forms.post :action="route('admin.auth.tabslanding.update',$landing_page_tabs->id)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Landing Page')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.tabslanding.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="tab1" class="col-md-2 col-form-label">@lang('Tab Title 1')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="tab1" class="form-control" placeholder="{{ __('Tab Title 1') }}" value="{{ $landing_page_tabs->tab1 }}" maxlength="100"  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tab2" class="col-md-2 col-form-label">@lang('Tab Title 2')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="tab2" class="form-control" placeholder="{{ __('Tab Title 2') }}" value="{{ $landing_page_tabs->tab2 }}" maxlength="100"  />
                        </div>
                    </div>
<div class="form-group row">
                        <label for="tab3" class="col-md-2 col-form-label">@lang('Tab Title 3')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="tab3" class="form-control" placeholder="{{ __('Tab Title 3') }}" value="{{ $landing_page_tabs->tab3 }}" maxlength="100"  />
                        </div>
                    </div>

<div class="form-group row">
                        <label for="tab4" class="col-md-2 col-form-label">@lang('Tab Title 4')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="tab4" class="form-control" placeholder="{{ __('Tab Title 4') }}" value="{{ $landing_page_tabs->tab4 }}" maxlength="100"  />
                        </div>
                    </div>



 <div class="form-group row">
                        <label for="tab1_description" class="col-md-2 col-form-label">@lang('Tab Description 1')</label>

                        <div class="col-md-10">
                            <textarea name="tab1_description" class="form-control"
                                placeholder="{{ __('Description ...') }}"
                                value="{{ $landing_page_tabs->tab1_description }}" minlength="100" rows="4"
                                cols="100">{{ $landing_page_tabs->tab1_description }}</textarea>
                        </div>
                    </div>

<div class="form-group row">
                        <label for="tab1_description" class="col-md-2 col-form-label">@lang('Tab Description 2')</label>

                        <div class="col-md-10">
                            <textarea name="tab2_description" class="form-control"
                                placeholder="{{ __('Description ...') }}"
                                value="{{ $landing_page_tabs->tab2_description }}" minlength="100" rows="4"
                                cols="100">{{ $landing_page_tabs->tab2_description }}</textarea>
                        </div>
                    </div>


<div class="form-group row">
                        <label for="tab3_description" class="col-md-2 col-form-label">@lang('Tab Description 3')</label>

                        <div class="col-md-10">
                            <textarea name="tab3_description" class="form-control"
                                placeholder="{{ __('Description ...') }}"
                                value="{{ $landing_page_tabs->tab3_description }}" minlength="100" rows="4"
                                cols="100">{{ $landing_page_tabs->tab3_description }}</textarea>
                        </div>
                    </div>

<div class="form-group row">
                        <label for="tab4_description" class="col-md-2 col-form-label">@lang('Tab Description 4')</label>

                        <div class="col-md-10">
                            <textarea name="tab4_description" class="form-control"
                                placeholder="{{ __('Description ...') }}"
                                value="{{ $landing_page_tabs->tab4_description }}" minlength="100" rows="4"
                                cols="100">{{ $landing_page_tabs->tab4_description }}</textarea>
                        </div>
                    </div>



            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Edit Landing Page')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

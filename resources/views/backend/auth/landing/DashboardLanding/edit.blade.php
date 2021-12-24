@extends('backend.layouts.app')

@section('title', __('Edit Landing Page'))

@section('content')
<x-forms.post :action="route('admin.auth.dashboardlanding.update',$landing_page_dashboard->id)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Landing Page')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.dashboardlanding.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="image_admin" class="col-md-2 col-form-label">@lang('Admin Image')</label>
                        
                        <div class="col-md-10">
                            <input type="file" name="image_admin" class="form-control" id="img_bg" placeholder="{{ __('Admin Image') }}" value="{{$landing_page_dashboard->image_admin }}"  />

                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="title_admin" class="col-md-2 col-form-label">@lang('Admin Title')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="title_admin" class="form-control" placeholder="{{ __('Admin Title') }}" value="{{ $landing_page_dashboard->title_admin }}" maxlength="100"  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description_admin" class="col-md-2 col-form-label">@lang('Admin Description')</label>

                        <div class="col-md-10">
                            <textarea name="description_admin" class="form-control"
                                placeholder="{{ __('Description ...') }}"
                                value="{{ $landing_page_dashboard->description_admin }}" maxlength="400" rows="4"
                                cols="100">{{ $landing_page_dashboard->description_admin }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label">@lang('User Dashboard Image')</label>
                        
                        <div class="col-md-10">
                            <input type="file" name="image_user" class="form-control" id="img_bg"  value="{{$landing_page_dashboard->image_user }}"  />
                           
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title_user" class="col-md-2 col-form-label">@lang('User Title')</label>
                        
                        <div class="col-md-10">
                            <input type="text" name="title_user" class="form-control" placeholder="{{ __('User Title') }}" value="{{ $landing_page_dashboard->title_user }}" maxlength="100"  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description_user" class="col-md-2 col-form-label">@lang('User Description')</label>

                        <div class="col-md-10">
                            <textarea name="description_user" class="form-control"
                                placeholder="{{ __('Description ...') }}"
                                value="{{ $landing_page_dashboard->description_user }}" maxlength="400" rows="4"
                                cols="100">{{ $landing_page_dashboard->description_user }}</textarea>
                        </div>
                    </div>

                    <x-slot name="footer">
                        <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Edit Landing Page')</button>
                    </x-slot>
                </x-slot>

              
            </x-backend.card>
        </x-forms.post>
    @endsection
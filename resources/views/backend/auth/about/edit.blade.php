@extends('backend.layouts.app')

@section('title', __('About Us Page'))

@section('content')
    <x-forms.post :action="route('admin.auth.about.update',$about->id)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('About Us Page')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.about.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="title_aboutus" class="col-md-2 col-form-label">@lang('About Us Title')</label>

                        <div class="col-md-10">
                            <input type="text" name="title_aboutus" class="form-control"
                                placeholder="{{ __('Abous Us') }}" value="{{ $about->title_aboutus }}"
                                maxlength="100" />
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="description_aboutus" class="col-md-2 col-form-label">@lang('Description')</label>

                        <div class="col-md-10">
                            <input type="text" name="description_aboutus" class="form-control"
                                placeholder="{{ __('About Description') }}"
                                value="{{ $about->description_aboutus }}" maxlength="100" />
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="description_aboutus" class="col-md-2 col-form-label">@lang('Description')</label>

                        <div class="col-md-10">
                            <textarea name="description_aboutus" class="form-control"
                                placeholder="{{ __('About Description ...') }}"
                                value="{{ $about->description_aboutus }}" minlength="100" maxlength="400" rows="4"
                                cols="100">{{ $about->description_aboutus }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title_cards" class="col-md-2 col-form-label">@lang('Title 1')</label>

                        <div class="col-md-10">
                            <input type="text" name="title_cards" class="form-control"
                                value="{{ $about->title_cards }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_cards" class="col-md-2 col-form-label">@lang('Description 1')</label>

                        <div class="col-md-10">
                            <textarea name="description_cards" class="form-control"
                                placeholder="{{ __('Description ...') }}" value="{{ $about->description_cards }}"
                                minlength="100" maxlength="230" rows="4"
                                cols="100">{{ $about->description_cards }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title2_cards" class="col-md-2 col-form-label">@lang('Title 2')</label>

                        <div class="col-md-10">
                            <input type="text" name="title2_cards" class="form-control"
                                value="{{ $about->title2_cards }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description2_cards" class="col-md-2 col-form-label">@lang('Description 2')</label>

                        <div class="col-md-10">
                            <textarea name="description2_cards" class="form-control"
                                value="{{ $about->description2_cards }}" minlength="100" maxlength="230" rows="4"
                                cols="100">{{ $about->description2_cards }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title3_cards" class="col-md-2 col-form-label">@lang('Title 3')</label>

                        <div class="col-md-10">
                            <input type="text" name="title3_cards" class="form-control"
                                value="{{ $about->title3_cards }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description3_cards" class="col-md-2 col-form-label">@lang('Description 3')</label>

                        <div class="col-md-10">
                            <textarea name="description3_cards" minlength="100" class="form-control"
                                value="{{ $about->description3_cards }}" maxlength="230" rows="4"
                                cols="100">{{ $about->description3_cards }}</textarea>
                        </div>
                    </div>

            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Edit About Page')</button>
            </x-slot>
        </x-backend.card>
        {{--  --}}
        <x-backend.card>
            <x-slot name="header">
                @lang('What we offer')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.about.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="offer" class="col-md-2 col-form-label">@lang('We Offer...')</label>

                    <div class="col-md-10">
                        <input type="text" name="offer" class="form-control"
                            value="{{ $about->offer }}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="offer_description" class="col-md-2 col-form-label">@lang('Description Offer')</label>

                    <div class="col-md-10">
                        <textarea name="offer_description" minlength="100" class="form-control"
                            value="{{ $about->offer_description }}" maxlength="300" rows="4"
                            cols="100">{{ $about->offer_description }}</textarea>
                    </div>
                </div>

            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Edit About Page')</button>
            </x-slot>
        </x-backend.card>

        {{--  --}}
        <x-backend.card>
            <x-slot name="header">
                @lang('Tabs Section')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.about.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="tab1" class="col-md-2 col-form-label">@lang('Tab Title 1')</label>

                        <div class="col-md-10">
                            <input type="text" name="tab1" class="form-control" placeholder="{{ __('Tab Title 1') }}"
                                value="{{ $about->tab1 }}" maxlength="100" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tab2" class="col-md-2 col-form-label">@lang('Tab Title 2')</label>

                        <div class="col-md-10">
                            <input type="text" name="tab2" class="form-control" placeholder="{{ __('Tab Title 2') }}"
                                value="{{ $about->tab2 }}" maxlength="100" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tab3" class="col-md-2 col-form-label">@lang('Tab Title 3')</label>

                        <div class="col-md-10">
                            <input type="text" name="tab3" class="form-control" placeholder="{{ __('Tab Title 3') }}"
                                value="{{ $about->tab3 }}" maxlength="100" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tab4" class="col-md-2 col-form-label">@lang('Tab Title 4')</label>

                        <div class="col-md-10">
                            <input type="text" name="tab4" class="form-control" placeholder="{{ __('Tab Title 4') }}"
                                value="{{ $about->tab4 }}" maxlength="100" />
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="tab1_description" class="col-md-2 col-form-label">@lang('Tab Description 1')</label>

                        <div class="col-md-10">
                            <textarea name="tab1_description" class="form-control"
                                placeholder="{{ __('Description ...') }}" value="{{ $about->tab1_description }}"
                                minlength="100" rows="4" cols="100">{{ $about->tab1_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tab1_description" class="col-md-2 col-form-label">@lang('Tab Description 2')</label>

                        <div class="col-md-10">
                            <textarea name="tab2_description" class="form-control"
                                placeholder="{{ __('Description ...') }}" value="{{ $about->tab2_description }}"
                                minlength="100" rows="4" cols="100">{{ $about->tab2_description }}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="tab3_description" class="col-md-2 col-form-label">@lang('Tab Description 3')</label>

                        <div class="col-md-10">
                            <textarea name="tab3_description" class="form-control"
                                placeholder="{{ __('Description ...') }}" value="{{ $about->tab3_description }}"
                                minlength="100" rows="4" cols="100">{{ $about->tab3_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tab4_description" class="col-md-2 col-form-label">@lang('Tab Description 4')</label>

                        <div class="col-md-10">
                            <textarea name="tab4_description" class="form-control"
                                placeholder="{{ __('Description ...') }}" value="{{ $about->tab4_description }}"
                                minlength="100" rows="4" cols="100">{{ $about->tab4_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title_cards" class="col-md-2 col-form-label">@lang('Confused?')</label>

                        <div class="col-md-10">
                            <input type="text" name="confused_features" class="form-control"
                                value="{{ $about->confused_features }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title_cards" class="col-md-2 col-form-label">@lang('Free Trial')</label>

                        <div class="col-md-10">
                            <input type="text" name="trial_days" class="form-control"
                                value="{{ $about->trial_days }}"> 
                        </div>
                    </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Edit About Page')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

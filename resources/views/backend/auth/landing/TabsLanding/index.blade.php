@extends('backend.layouts.app')
@section('title', __('Landing Page'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            Landing Page

        </x-slot>
        <x-slot name="body">

            <section class="section4">
            @foreach($landing_page_tabs as $landing)
                <!-- tabs -->
                <div class="container">
                    <div class="row">
                        <div class="nav_tabs">

                            <div class="d-flex align-items-center text-center display_nav">
                                <div class="col-lg-3">
                                    <div class="nav flex-column nav-pills bg_color_tab" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link bg_color_tab active" id="v-pills-home-tab" data-toggle="pill"
                                            href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                            aria-selected="true">{{$landing->tab1}}</a>
                                        <a class="nav-link bg_color_tab" id="v-pills-profile-tab" data-toggle="pill"
                                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                            aria-selected="false">{{$landing->tab2}}</a>
                                        <a class="nav-link bg_color_tab" id="v-pills-messages-tab" data-toggle="pill"
                                            href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                            aria-selected="false">{{$landing->tab3}}</a>
                                        <a class="nav-link bg_color_tab" id="v-pills-settings-tab" data-toggle="pill"
                                            href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                            aria-selected="false">{{$landing->tab4}}</a>
                                    </div>
                                </div>

                                <div class="col-lg-9">
                                    <div class="tab-content borders" id="v-pills-tabContent">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                                aria-labelledby="v-pills-home-tab">{{$landing->tab1_description}}</div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                aria-labelledby="v-pills-profile-tab">{{$landing->tab2_description}}</div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                aria-labelledby="v-pills-messages-tab">{{$landing->tab3_description}}</div>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                                aria-labelledby="v-pills-settings-tab">{{$landing->tab4_description}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                 <div class="edits d-flex justify-content-center mt-5">
                <a href="{{ route('admin.auth.tabslanding.edit', $landing->id) }}" class="btn btn-info btn-md pl-4 pr-4">
                    <i class="far fa-edit"></i> Edit
                </a>
                <a href="{{ route('admin.dashboard', $landing->id) }}" class="btn btn-danger btn-md ml-2">
                    <i class="fas fa-ban"></i> Cancel
                </a>
            </div>

                @endforeach
            </section>

            <!-- end of tabs -->
        </x-slot>
    </x-backend.card>
@endsection

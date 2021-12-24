@extends('frontend.layouts.landing_nav')
<!--?xml version="1.0" encoding="utf-8"?-->
<!-- Generator: Adobe Illustrator 25.2.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<div class="svg-preload-parent">
    <svg class="preload-svg" style="visibility: hidden" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="px" viewBox="0 200 200"
        style="enable-background:new 0 0 500 500;" xml:space="preserve" width="500" height="500">
        <style type="text/css">
            .st0 {
                fill: #FFFFFF;
                stroke: #1BBF7A;
                stroke-width: 2.4;
                stroke-miterlimit: 10;
            }

            .st1 {
                fill: none;
                stroke: #1BBF7A;
                stroke-width: 2.4;
                stroke-miterlimit: 10;
            }

            .st2 {
                fill: #1BBF7A;
            }

        </style>
        <g>
            <circle class="st0 svg-elem-1" cx="250" cy="250" r="237.6"></circle>
            <path class="st1 svg-elem-2"
                d="M85.7,78.4l15.5,15.8 M46.2,330.6c23.1,23.1,53.8,19.5,82.6,20.2 M76.4,146.8c-49.1,35.1-61,106.4-59.2,106
             M138.8,152c-5.1,37.3,8.4,78.3,36.4,122 M164.5,45.1c15.7-15.7,46.6-26.7,87.3-32.9 M199,423.4c-5,13.2-3.7,31.5-0.8,51
             M204.4,86.1c28.2,3.2,79.2,7.4,119.6,30.3 M283.6,380.8c31,17.3,64.9,24.7,106,18 M355.6,198c-24.2,33.4-53.4,64.5-87.2,93.6
             M379.3,79.7c-11.1-20.7-29.6-37.5-49.9-53.4 M444,154.4c10,0.3,19.7,4.4,29,14.1 M429.2,218c15.8,29.7,18.1,71.8,20.4,114"></path>
        </g>
        <path class="st2 svg-elem-3" d="M87.6,80c24.3-15.3,49.8-30.3,85.6-42.4c14.1,11.7,25.3,30.7,37.2,49.2c-28.8,27.5-56.2,54.4-72.4,75.6
        c-27.4-2.5-41-0.2-74-6C64.3,132,72.4,106.5,87.6,80z M378,76c27.1,24.8,53.7,49.8,72.4,78.8c-5.5,26.2-10.5,55.3-18,70.4
        c-23.4-3.5-53.6-12.5-82-20c-13.8-35.7-23.1-62.5-34-92.4C337.4,97.2,358.1,83.2,378,76z M50.7,379.3c-26.7-41.4-39.9-90-37.8-139.2
        l5.9-0.7c5.4,34.2,12.4,67.4,31.1,92.8c-3.6,17.9-0.2,32.3,5.1,45.8L50.7,379.3z M170.4,266.8c36.5,6,71.7,12,106,18
        c10.6,33.3,12,66.7,15.6,100c-26.3,21.8-62.5,28.7-94.4,42c-37.2-24-52.3-50.8-73.6-76.8C136.2,321.9,149.7,293.9,170.4,266.8z
         M471.7,334.6c-17.9,47.1-50.3,87.2-92.5,114.7l-11.6-0.5c8.4-12.7,11.4-29.7,11.8-48.8c23.2-11.1,46.4-46.3,69.6-77.2
        C457.6,325.8,464.9,330,471.7,334.6z M243,487.3c-34.5-1-68.4-9.6-99.3-25.1c19.9,7.4,36.7,14.3,54.2,8.3
        C203.2,478,215.5,483.9,243,487.3z"></path>
    </svg>
</div>


<style>
    html{
        scroll-behavior: smooth !important;
    }
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fbf9f6;
        scroll-behavior: smooth !important;
        }

</style>



@section('title', __('Dashboard'))
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow_top fas fa-arrow-up"></i></button>
@section('content')
    @stack('after-styles')
  
    <!--content-->
@include('frontend.includes.nav-landing')
    {{-- New Landing Page --}}


    @foreach (\App\Domains\Auth\Models\LandingPageModels\LandingPage::all() as $landing)

        <section class="landing_page">
            @if ($landing->image != null)
                <img src="{{ asset('/uploads/LandingPageImages/' . $landing->image) }}" alt="" value="{{ old('image') }}"
                    class="image_nav">
            @elseif($landing->image == null)
                <img src="{{ asset('/images/showcase.jpg/') }}" value="{{ old('image') }}" class="image_nav">
            @endif

            <div class="landing_story">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="dashboard-box-white">
                                <h1 class="title "><b>{{ $landing->title }}</b></h1>

                                <p class="description">{{ $landing->description }}</p>

                                @if (!$logged_in_user)
                                    <x-utils.link :href="route('frontend.auth.login')" class="remove_shad btn btn-carts text-capitalize"
                                        :text="__('Login')" />
                                @elseif ($logged_in_user->isAdmin())
                                    <x-utils.link :href="route('admin.dashboard')" class="remove_shad btn btn-carts text-capitalize"
                                        :text="__('Administration')" />
                                @elseif($logged_in_user->isUser())
                                    <x-utils.link :href="route('frontend.user.dashboard')"
                                        class="remove_shad btn btn-carts text-capitalize"
                                        :active="activeClass(Route::is('frontend.user.dashboard'))"
                                        :text="__('Dashboard')" />
                                @endif

                            </div>
                            <div class="col-lg-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    {{-- Start Section --}}
    @foreach (\App\Domains\Auth\Models\LandingPageModels\AboutUs::all() as $landing)

        <section class="section2">
            <div class="container">
                <div class="title_part2 text-center mb-5">
                    <h1>{{ $landing->title_aboutus }}</h1>
                    <p>{{ $landing->description_aboutus }}</p>
                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-12">

                        <div class="cards_shadow">



                            <h3>{{ $landing->title_cards }}</h3>
                            <p class="description_card">
                                {{ $landing->description_cards }}
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="cards_shadow">
                            <h3>{{ $landing->title2_cards }}</h3>
                            <p class="description_card">
                                {{ $landing->description2_cards }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="cards_shadow">
                            <h3>{{ $landing->title3_cards }}</h3>
                            <p class="description_card">{{ $landing->description3_cards }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>

        <section class="section3">

            @foreach (\App\Domains\Auth\Models\LandingPageModels\DashboardView::all() as $landing)

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">

                            @if ($landing->image_admin != null)
                                <img src="{{ asset('/uploads/LandingPageImagesDashboard/' . $landing->image_admin) }}" alt=""
                                    value="{{ old('image_admin') }}" class="admindesktop" width="100%" alt="">
                            @elseif($landing->image_admin == null)
                                <img src="{{ asset('/images/admindesktopdashboard.png/') }}"
                                    value="{{ old('image_admin') }}" class="admindesktop" width="100%" alt="">
                            @endif


                            {{-- <img src="{{$landing->image_admin}}" class="admindesktop" width="100%" alt=""> --}}
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="admindashboard">
                                <h1 class="admin_dashboard">{{ $landing->title_admin }}</h1>
                                <p class="description_card">{{ $landing->description_admin }}</p>
                            </div>
                        </div>

                        <div class="buffer"></div>
                        <div class="col-lg-6 col-md-6 col-sm-12 user_order">
                            <div class="admindashboard">
                                <h1 class="admin_dashboard">{{ $landing->title_user }}</h1>
                                <p class="description_card">{{ $landing->description_user }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            @if ($landing->image_user != null)
                                <img src="{{ asset('/uploads/LandingPageImagesDashboard/' . $landing->image_user) }}"
                                    width="100%" value="{{ old('image_user') }}" class="userdesktop" alt="">
                            @elseif($landing->image_user == null)
                                <img src="{{ asset('/images/userdesktopdashboard.png/') }}"
                                    value="{{ old('image_user') }}" width="100%" class="userdesktop">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
   
    <section class="section4">

        <!-- tabs -->
        <div class="container">
            <div class="row">
                <div class="nav_tabs">
                @foreach (\App\Domains\Auth\Models\LandingPageModels\LandingPage::all() as $landing)
                    <div class="d-flex align-items-center text-center display_nav">
                        <div class="col-lg-2">
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

                        <div class="col-lg-10">
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
        @endforeach
    </section>

    <!-- end of tabs -->
    <section class="section5">
        <div class="container">
            <div class="row card shadow p-4 my-4">
                <h5>Some components of the application can not be used without subscribing. <a href="{{ route('frontend.user.subscription.index') }}">Learn more</a> about the packages we offer</h5>
            </div>
        </div>
    </section>

    <footer>
        <div class="container-fluid footer_color">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h6 class="copyright">Copyright SportStats 2021.</h6>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h6 class="team">SportStats Team.</h6>
                    </div>
                </div>
            </div>
        </div>
    </footer>



<script>
var mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

@endsection

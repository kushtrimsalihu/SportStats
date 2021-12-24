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
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fbf9f6;
    }

</style>



@section('title', __('About Us'))
@section('content')
    @stack('after-styles')
    @include('frontend.includes.nav-landing')
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#1BBF7A" fill-opacity="1"
            d="M0,192L21.8,160C43.6,128,87,64,131,48C174.5,32,218,64,262,90.7C305.5,117,349,139,393,122.7C436.4,107,480,53,524,58.7C567.3,64,611,128,655,170.7C698.2,213,742,235,785,250.7C829.1,267,873,277,916,240C960,203,1004,117,1047,117.3C1090.9,117,1135,203,1178,218.7C1221.8,235,1265,181,1309,170.7C1352.7,160,1396,192,1418,208L1440,224L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z">
        </path>
    </svg>

    <section class="section_about1">
        <div class="container">
            <div class="title_part2 text-center mb-5">
                @foreach ($about as $detail)
                    <h1>{{ $detail->title_aboutus }}</h1>
                    <p>{{ $detail->description_aboutus }}</p>
            </div>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="cards_shadow">

                        <h3>{{ $detail->title_cards }}</h3>
                        <p class="description_card">
                            {{ $detail->description_cards }}
                        </p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="cards_shadow">
                        <h3>{{ $detail->title2_cards }}</h3>

                        <p class="description_card">
                            {{ $detail->description2_cards }}</p>
                    </div>


                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="cards_shadow">
                        <h3>{{ $detail->title3_cards }}</h3>
                        <p class="description_card">{{ $detail->description3_cards }} </p>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </section>


    <section class="section_about2">
      
        <div class="container">
            <div class="row"> 
                 @foreach($about as $detail)
                <div class="col-lg-12">
                    <h1>{{ $detail->offer }}</h1>
                    <p>{{ $detail->offer_description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <section class="section4">
        @foreach ($about as $detail)
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
                                        aria-selected="true">{{ $detail->tab1 }}</a>
                                    <a class="nav-link bg_color_tab" id="v-pills-profile-tab" data-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false">{{ $detail->tab2 }}</a>
                                    <a class="nav-link bg_color_tab" id="v-pills-messages-tab" data-toggle="pill"
                                        href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                        aria-selected="false">{{ $detail->tab3 }}</a>
                                    <a class="nav-link bg_color_tab" id="v-pills-settings-tab" data-toggle="pill"
                                        href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false">{{ $detail->tab4 }}</a>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="tab-content borders" id="v-pills-tabContent">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">{{ $detail->tab1_description }}</div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab">{{ $detail->tab2_description }}</div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab">{{ $detail->tab3_description }}</div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab">{{ $detail->tab4_description }}</div>
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
    <div class="container-fluid confuse m-0 p-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#1BBF7A" fill-opacity="1"
                d="M0,192L48,181.3C96,171,192,149,288,133.3C384,117,480,107,576,122.7C672,139,768,181,864,197.3C960,213,1056,203,1152,202.7C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
        <div class="confused">
            <div class="container">
                <div class="row">
                    {{-- @foreach ($about as $detail)
                    
                @endforeach --}}
                    <div class="col-lg-6">
                        <h3 class="confused_features">
                            {{ $detail->confused_features }} <br>
                            {{ $detail->trial_days }}
                        </h3>
                        <h3 class="faquestions"><a href="{{route('frontend.faq')}}">Frequently Asked Questions.</a></h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="sign_up_about">
                            <h3 class="trial_text">Start with Register</h3>
                            <h3 class="confused_trial"><a href="{{ route('frontend.auth.register') }}">sign up</a></h3>
                        </div>

                    </div>
                </div>
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

    @endsection

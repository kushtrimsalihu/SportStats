@extends('frontend.layouts.landing_nav')


<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fbf9f6;
    }
</style>



@section('title', __('Dashboard')) @section('content') @stack('after-styles')
    @include('frontend.includes.nav-landing')
<!--content-->
<div class="container">
    <h2 class="line-heading">Frequently Asked Questions</h2>
        <h3 class="large-heading mt-5">Some of the most common questions asked about SportStats</h3>
        <div id="faqSection" class="row pt-5">
            @foreach($faqs as $faq)
                 <div class="col-12">
                    <button class="collapsible">{{$faq->questions}}</button>
                    <div class="faq-content">
                        <p>{{$faq->answers}}</p>
                    </div>
                </div>
            @endforeach
    </div>
</div>
@endsection

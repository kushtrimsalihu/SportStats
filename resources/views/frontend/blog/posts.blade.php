@extends('frontend.layouts.landing_nav')


<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fbf9f6;
    }
</style>



@section('title', __('Dashboard')) @section('content') @stack('after-styles')
@include('frontend.includes.nav-landing')
<section>
    <div class="card-container justify-content-center">
            <div class="row justify-content-center">
            @foreach ($posts as $post)
            <div class="d-flex">
                <div class="card" style="width: 23rem;">
                    <a href="{{ route('frontend.postshow', $post->id) }}">
                        <img src="{{asset('/postuploads/PostsImages/'.$post->image)}}"/>
                            <h3 class="p-2"style="min-height: 60px">{{ $post->title }}</h3>
                    </a>
                    <div class="p-2">
                    <p>{!! implode(' ', array_slice(explode(' ', $post->content),0,15)).'...' !!}</p>
                    </div>
                <div class="row justify-content-center m-2">
                    <a href="{{ route('frontend.postshow', $post->id) }}" class="btn btn-outline-success btn-sm">Read More</a>
                </div>
                <div class="footer row justify-content-center m-1">
                    <div class="col">
                        <small class="text-muted"><i class="fas fa-calendar-alt"></i> {{$post->created_at}} </small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center m-4">
        <div class="row">
           <p style="text-align: center"> {{ $posts->links() }}</p>
        </div>
    </div>
</div>
</section>

@endsection






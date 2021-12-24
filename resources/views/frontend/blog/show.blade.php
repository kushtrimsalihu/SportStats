@extends('frontend.layouts.landing_nav')


<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fbf9f6;
    }
</style>



@section('title', __('Dashboard')) @section('content') @stack('after-styles')
@include('frontend.includes.nav-landing')

<article class="show-post">
	<h3>
		<span class="focusing">{{ $post->title }}</span>
	</h3>
    <cite>
    	Published | <span class="name">{{$post->created_at}}</span>
	</cite>

	<img src="{{asset('/postuploads/PostsImages/'.$post->image)}}"/>

	<main class="show-paragraph">
		<p>{!! $post->content !!}</p>
    </main>

</article>


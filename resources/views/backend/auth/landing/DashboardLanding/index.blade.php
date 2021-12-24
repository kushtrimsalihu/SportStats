

@extends('backend.layouts.app')

@section('title', __('Landing Page'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            Landing Page
        </x-slot>
        <x-slot name="body">
            <section class="section3">
                @foreach($landing_page_dashboard as $landing)
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            @if ($landing->image_admin != null)
                            <img src="{{asset('/uploads/LandingPageImagesDashboard/'.$landing->image_admin)}}" width="100%" class="image_nav">
                           @elseif($landing->image_admin == null)
                           <img src="{{asset('/images/admindesktopdashboard.png/')}}" width="100%"  class="image_nav">
                           @endif 
                           
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="admindashboard mt-5">
                                <h1 class="admin_dashboard">{{$landing->title_admin}}</h1>
                                <p class="description_card">{{$landing->description_admin}}</p>
                            </div>
                        </div>
            
                        <div class="buffer"></div>
                        <div class="col-lg-6 col-md-6 col-sm-12 user_order">
                            <div class="admindashboard mt-5">
                                <h1 class="admin_dashboard">{{$landing->title_user}}</h1>
                                <p class="description_card">{{$landing->description_user}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            @if ($landing->image_user != null)
                            <img src="{{asset('/uploads/LandingPageImagesDashboard/'.$landing->image_user)}}" width="100%" class="image_nav">
                           @elseif($landing->image_user == null)
                           <img src="{{asset('/images/userdesktopdashboard.png/')}}" width="100%"  class="image_nav">
                           @endif 
                          
                        </div>
                        <div class="edits d-flex justify-content-center mt-5" style="margin: 0 auto">
                            <a href="{{route('admin.auth.dashboardlanding.edit', $landing->id)}}"  class="btn btn-info btn-md pl-4 pr-4">
                                <i class="far fa-edit"></i>  Edit
                              </a>
                              <a href="{{route('admin.dashboard', $landing->id)}}"  class="btn btn-danger btn-md ml-2">
                                <i class="fas fa-ban"></i> Cancel
                              </a>
                                </div>
                               
                                </div>
            
            
                    </div>
                </div>
                @endforeach
            </section>
            
        </x-slot>
    </x-backend.card>
@endsection

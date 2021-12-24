@extends('backend.layouts.app')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
@section('title', __('About Us'))


@section('content')
    <x-backend.card>
        <x-slot name="header">
            About Us
        </x-slot>
        <x-slot name="body">
            <section class="section2">
                <div class="container">
                    <div class="title_part2 text-center mb-5">
                        @foreach ($about as $detail)
                        
                        <h1>{{$detail->title_aboutus}}</h1> 
                        <p>{{$detail->description_aboutus}}</p>
                    </div>
                    <div class="row">
            
                        <div class="col-lg-4 col-md-4 col-sm-12">
                           
                            <div class="cards_shadow">
                               
                                <h3>{{$detail->title_cards}}</h3>
                                <p class="description_card">
                                    {{$detail->description_cards}}
                                  </p>
                          
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="cards_shadow">
                                <h3>{{$detail->title2_cards}}</h3>
                              
                                <p class="description_card">
                                    {{$detail->description2_cards}}</p>
                            </div> 
                            <div class="edits d-flex justify-content-center mt-5">
                        <a href="{{route('admin.auth.about.edit', $detail->id)}}"  class="btn btn-info btn-md pl-4 pr-4">
                            <i class="far fa-edit"></i>  Edit
                          </a>
                          <a href="{{route('admin.dashboard', $detail->id)}}"  class="btn btn-danger btn-md ml-2">
                            <i class="fas fa-ban"></i> Cancel
                          </a>
                            </div>
                           
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="cards_shadow">
                                <h3>{{$detail->title3_cards}}</h3>
                                <p class="description_card">{{$detail->description3_cards}} </p>
                            </div>
                        </div>
                      
                    </div>
                </div>
                 @endforeach
            </section>

                       
                       
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="body">
            <section class="section4">
                @foreach($about as $detail)
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
                                                aria-selected="true">{{$detail->tab1}}</a>
                                            <a class="nav-link bg_color_tab" id="v-pills-profile-tab" data-toggle="pill"
                                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                                aria-selected="false">{{$detail->tab2}}</a>
                                            <a class="nav-link bg_color_tab" id="v-pills-messages-tab" data-toggle="pill"
                                                href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                                aria-selected="false">{{$detail->tab3}}</a>
                                            <a class="nav-link bg_color_tab" id="v-pills-settings-tab" data-toggle="pill"
                                                href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                                aria-selected="false">{{$detail->tab4}}</a>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-9">
                                        <div class="tab-content borders" id="v-pills-tabContent">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                                    aria-labelledby="v-pills-home-tab">{{$detail->tab1_description}}</div>
                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                    aria-labelledby="v-pills-profile-tab">{{$detail->tab2_description}}</div>
                                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                    aria-labelledby="v-pills-messages-tab">{{$detail->tab3_description}}</div>
                                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                                    aria-labelledby="v-pills-settings-tab">{{$detail->tab4_description}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                     <div class="edits d-flex justify-content-center mt-5">
                    <a href="{{ route('admin.auth.about.edit', $detail->id) }}" class="btn btn-info btn-md pl-4 pr-4">
                        <i class="far fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.dashboard', $detail->id) }}" class="btn btn-danger btn-md ml-2">
                        <i class="fas fa-ban"></i> Cancel
                    </a>
                </div>
    
                    @endforeach
                </section>
        </x-slot>
    </x-backend.card>


    <x-backend.card>
        <x-slot name="body">
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
                <div class="edits d-flex justify-content-center mt-5">
                    <a href="{{ route('admin.auth.about.edit', $detail->id) }}" class="btn btn-info btn-md pl-4 pr-4">
                        <i class="far fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.dashboard', $detail->id) }}" class="btn btn-danger btn-md ml-2">
                        <i class="fas fa-ban"></i> Cancel
                    </a>
                </div>
            </section>
        
        </x-slot>
    </x-backend.card> 

    <x-backend.card>
        <x-slot name="body">
            <section class="section4">
                <div class="container-fluid confuse m-0 p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#1BBF7A" fill-opacity="1"
                            d="M0,192L48,181.3C96,171,192,149,288,133.3C384,117,480,107,576,122.7C672,139,768,181,864,197.3C960,213,1056,203,1152,202.7C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>
                    <div class="confused">
                         <div class="container">
                        <div class="row">
                              <div class="col-lg-6">
                                <h3 class="confused_features">
                                    {{$detail->confused_features}} <br>
                                    {{$detail->trial_days}}
                                </h3>
                              </div>
                                                          
                        </div>
                    </div>
                    </div>
                   
                </div>
                <div class="edits d-flex justify-content-center mt-5">
                    <a href="{{ route('admin.auth.about.edit', $detail->id) }}" class="btn btn-info btn-md pl-4 pr-4">
                        <i class="far fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.dashboard', $detail->id) }}" class="btn btn-danger btn-md ml-2">
                        <i class="fas fa-ban"></i> Cancel
                    </a>
                </div>
                       

            </section>
        </x-slot>
    </x-backend.card>   
  
@endsection

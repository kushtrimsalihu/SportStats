@extends('backend.layouts.app')

@section('title', __('Landing Page'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            Landing Page
            {{-- <x-utils.link class="card-header-action" :href="route('admin.dashboard')" :text="__('Cancel')" /> --}}
         
                {{-- <a href="{{route('admin.dashboard')}}" class="cancelHeader">Cancel</a>
             --}}
        </x-slot>
        <x-slot name="body">
            <section class="section2">
                <div class="container">
                    <div class="title_part2 text-center mb-5">
                        @foreach ($landing_page_about as $landing)
                        
                        <h1>{{$landing->title_aboutus}}</h1> 
                        <p>{{$landing->description_aboutus}}</p>
                    </div>
                    <div class="row">
            
                        <div class="col-lg-4 col-md-4 col-sm-12">
                           
                            <div class="cards_shadow">
                               
                                <h3>{{$landing->title_cards}}</h3>
                                <p class="description_card">
                                    {{$landing->description_cards}}
                                  </p>
                          
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="cards_shadow">
                                <h3>{{$landing->title2_cards}}</h3>
                              
                                <p class="description_card">
                                    {{$landing->description2_cards}}</p>
                            </div> 
                            <div class="edits d-flex justify-content-center mt-5">
                        <a href="{{route('admin.auth.aboutlanding.edit', $landing->id)}}"  class="btn btn-info btn-md pl-4 pr-4">
                            <i class="far fa-edit"></i>  Edit
                          </a>
                          <a href="{{route('admin.dashboard', $landing->id)}}"  class="btn btn-danger btn-md ml-2">
                            <i class="fas fa-ban"></i> Cancel
                          </a>
                            </div>
                           
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="cards_shadow">
                                <h3>{{$landing->title3_cards}}</h3>
                                <p class="description_card">{{$landing->description3_cards}} </p>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </section>

                        @endforeach
                       
        </x-slot>
    </x-backend.card>
@endsection

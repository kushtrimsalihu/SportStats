@extends('frontend.layouts.app-WithoutSidebar')

@section('title', __('My Account'))

@section('content')
<body class="profile-body">
<div class="wrapper-profile bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom"><b>Account settings</b></h4>
    <div class="d-flex align-items-start py-3 border-bottom"> <img src="{{ $logged_in_user->avatar }}" class="img-profile" alt="">
        <div class="pl-sm-4 pl-2" id="img-section-pr">
            <b>{{ $logged_in_user->name }}</b><br>
            <span class="text-black-50">{{ $logged_in_user->email }}</span><br>
            <span>{{ $logged_in_user->timezone ? str_replace('_', ' ', $logged_in_user->timezone) : __('N/A') }}</span>
        </div>
    </div>
    <div class="py-2">
        <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"><b>@lang('Type')</b></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @include('backend.auth.user.includes.type', ['user' => $logged_in_user])
            </div>
          </div>
          <hr>
        <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"><b>@lang('Name')</b></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ $logged_in_user->name }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"><b>@lang('E-mail Address')</b></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ $logged_in_user->email }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"><b>@lang('Timezone')</b></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ $logged_in_user->timezone ? str_replace('_', ' ', $logged_in_user->timezone) : __('N/A') }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"><b>@lang('Account Created')</b></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @displayDate($logged_in_user->created_at) ({{ $logged_in_user->created_at->diffForHumans() }})
            </div>
        </div>
        <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"><b>@lang('Last Updated')</b></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @displayDate($logged_in_user->updated_at) ({{ $logged_in_user->updated_at->diffForHumans() }})
            </div>
        </div>
        <div class="py-2">
        @include('frontend.user.account.tabs.information')
        @include('frontend.user.account.tabs.password')
        
        </div>
    </div>




    </div>
</div>
</body>
@endsection


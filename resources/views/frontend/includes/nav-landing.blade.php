<div id="app" class="p-1 color_home">
    <nav class="navbar navbar-expand-lg px-4 py-2 spaces">
        <a href="{{ route('frontend.index') }}">
            @foreach(\App\Domains\Auth\Models\UpdateInformation::all() as $logo)
              @if ($logo->icon != null)
                    <img src="{{asset('/uploads/logo/'.$logo->icon)}}" width="200px" height="55px" class="logo_landing_nav">
                   @elseif($logo->icon == null)
                   <img src="{{asset('/images/logo.png/')}}" width="200px" height="55px"  class="logo_landing_nav">
                   @endif 
         </a>
        @endforeach
   
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="justify-content-lg-end links collapse navbar-collapse" id="navbarSupportedContent">
            @auth

                <div class="top-right links">
                    @if ($logged_in_user->isAdmin())
                        <x-utils.link :href="route('admin.dashboard')"
                            class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white" :text="__('Administration')" />
                    @endif
                    @if ($logged_in_user->isUser())
                        <x-utils.link :href="route('frontend.user.dashboard')"
                            class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white"
                            :active="activeClass(Route::is('frontend.user.dashboard'))" :text="__('Dashboard')" />
                    @endif
                    <x-utils.link :href="route('frontend.posts')" class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white"
                        :text="__('Blog')" />
                    <x-utils.link :href="route('frontend.faq')" class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white"
                    :text="__('FAQ')" />
                    <x-utils.link :href="route('frontend.user.account')"
                        class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white" :text="__('Account')" />
                    <x-utils.link :text="__('btn btn-lg font-weight-medium auth-form-btn')"
                        class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                    </x-utils.link>
                @else
                    <link rel="stylesheet" type="text/css" href="{{ url('./css/stylenav.css') }}" />
                    <div class="navs">
                        <x-utils.link :href="route('frontend.posts')" class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white"
                        :text="__('Blog')" />
                        <x-utils.link :href="route('frontend.faq')" class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white"
                    :text="__('FAQ')" />
                        <x-utils.link :href="route('frontend.about')" class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white"
                        :text="__('About')" />

                        <x-utils.link :href="route('frontend.auth.login')" class="remove_shad btn btn-lg font-weight-medium auth-form-btn text-white" :text="__('Login/Register')" />
                    </div>
                @endauth

            </div>
                 </div>
              
                </div>
        </div>

    </div>

 

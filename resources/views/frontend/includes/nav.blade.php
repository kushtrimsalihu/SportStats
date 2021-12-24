<link rel="stylesheet" type="text/css" href="{{ url('./css/stylenav.css') }}" />
<div class="header2">
    <div class="logo-details justify-content-center align-items-center logo-text show-text">
    <div id="admin-sidebar-header" class="p-2 remove-text">
                 <a href="{{ route('frontend.index') }}">
                    @foreach(\App\Domains\Auth\Models\UpdateInformation::all() as $logo)
                      @if ($logo->icon != null)
                            <img src="{{asset('/uploads/logo/'.$logo->icon)}}" width="200px" height="55px" class="logo_landing_nav">
                           @elseif($logo->icon == null)
                           <img src="{{asset('/images/logo.png/')}}" width="200px" height="55px"  class="logo_landing_nav">
                           @endif 
                
                @endforeach
            </a>
            </div>
        <!-- <span class="logo_name">SportStats</span> -->
    </div>
    <div class="containernav-xxl d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center">
            {{-- <button class="btnnav btnnav-icon btnnav-accent me-2 me-lg-6" id="kt_mega_menu_toggle" data-bs-toggle="modal"
                data-bs-target="#kt_mega_menu_modal">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                        <rect y="6" width="16" height="3" rx="1.5" fill="black"></rect>
                        <rect opacity="0.3" y="12" width="8" height="3" rx="1.5" fill="black"></rect>
                        <rect opacity="0.3" width="12" height="3" rx="1.5" fill="black"></rect>
                    </svg>
                </span>
            </button> --}}
            
         
             <!-- <h2 class="h-30px">Sport Stats</h2>  -->
        </div>
        <div class="d-flex align-items-center ">
            {{-- <div>
            <a href="{{ route('frontend.index') }}" class="nav-item text-white text-decoration-none">
                <h4>Home</h4>
            </a>
            <a href="{{ route('frontend.user.dashboard') }}" class="nav-item text-white text-decoration-none">
                <h4>Dashboard</h4>
            </a>
        </div> --}}
            <ul class="navbar-nav ml-auto order-lg-last" >
                @guest
                    <li class="nav-item">
                        <x-utils.link :href="route('frontend.auth.login')"
                            :active="activeClass(Route::is('frontend.auth.login'))" :text="__('Login')"
                            class="nav-link" />
                    </li>

                    @if (config('boilerplate.access.user.registration'))
                        <li class="nav-item">
                            <x-utils.link :href="route('frontend.auth.register')"
                                :active="activeClass(Route::is('frontend.auth.register'))"
                                :text="__('Register')" class="nav-link" />

                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <x-utils.link href="#" id="navbarDropdown" class="nav-link dropdown-toggle"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            v-pre>
                            <x-slot name="text">
                                <img class="rounded-circle" style="max-height: 40px"
                                    src="{{ $logged_in_user->avatar }}" />
                                 <span class="caret"></span>
                            </x-slot>
                        </x-utils.link>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if ($logged_in_user->isAdmin())
                                <x-utils.link :href="route('admin.dashboard')" :text="__('Administration')"
                                    class="dropdown-item" />
                            @endif

                            @if ($logged_in_user->isUser())
                                <x-utils.link :href="route('frontend.user.dashboard')"
                                    :active="activeClass(Route::is('frontend.user.dashboard'))"
                                    :text="__('Dashboard')" class="dropdown-item" />
                            @endif

                            <x-utils.link :href="route('frontend.user.account')"
                                :active="activeClass(Route::is('frontend.user.account'))"
                                :text="__('My Account')" class="dropdown-item" />

                            <x-utils.link :text="__('Logout')" class="dropdown-item"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <x-slot name="text">
                                    @lang('Logout')
                                    <x-forms.post :action="route('frontend.auth.logout')" id="logout-form"
                                        class="d-none" />
                                </x-slot>
                            </x-utils.link>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>

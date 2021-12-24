<link rel="stylesheet" type="text/css" href="{{ url('./css/stylenav.css') }}" />
<div id="admin-dashboard-navbar-color">
    <div class="d-flex container-fluid  px-4 p-2">
        <div class="mr-auto">
            <button class="btnnav btnnav-icon2 btnnav-accent me-2 me-lg-6" id="admin-dashboard-sidebar-button" onclick="openSidebar()"><span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                    <rect y="6" width="16" height="3" rx="1.5" fill="black"></rect>
                    <rect opacity="0.3" y="12" width="8" height="3" rx="1.5" fill="black"></rect>
                    <rect opacity="0.3" width="12" height="3" rx="1.5" fill="black"></rect>
                </svg>
            </span></button>
        </div>
        <div class="d-flex">
            <ul class="p-1 m-0 list-unstyled">
                <li class="c-header-nav-item dropdown">
                    <x-utils.link class="c-header-nav-link m-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <x-slot name="text">
                            <div class="c-avatar">
                                <img class="c-avatar-img" src="{{ $logged_in_user->avatar }}" alt="{{ $logged_in_user->email ?? '' }}">
                            </div>
                        </x-slot>
                    </x-utils.link>          
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2">
                            <strong>@lang('Account')</strong>
                        </div>
                        <x-utils.link class="dropdown-item">
                            <x-utils.link
                                :href="route('frontend.user.account')"
                              :active="activeClass(Route::is('frontend.user.account'))"
                              :text="__('My Account')"
                              class="dropdown-item" />
                            </x-utils.link>
                            <x-utils.link
                              class="dropdown-item"
                              icon="c-icon mr-2 cil-account-logout"
                              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <x-slot name="text">
                                @lang('Logout')
                              <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                            </x-slot>
                        </x-utils.link>
                    </div>
                  </li>
              </ul>
        </div>
    </div>
</div>
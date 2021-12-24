<div id="close-nav" class="sidebar sidebar-sm">
    {{-- <div class="logo-details mt-3"> --}}
        <div id="admin-sidebar-header" class="d-flex justify-content-center mt-3 ml-1 ">
            <a href="{{ route('frontend.index') }}">
               @foreach(\App\Domains\Auth\Models\UpdateInformation::all() as $logo)
                 @if ($logo->icon != null)
                       <img class="invert" src="{{asset('/uploads/logo/'.$logo->icon)}}" width="200px" height="55px" class="logo_landing_nav">
                      @elseif($logo->icon == null)
                      <img class="invert" src="{{asset('/images/logo.png/')}}" width="200px" height="55px"  class="logo_landing_nav">
                     
                      @endif 
           </a>
           @endforeach
       </div>
    <ul class="nav-links">
        <li>
            <div class="iocn-link">
                <a href="{{URL::route('frontend.index')}}">
                    <i class="fas fa-house-user"></i>
                    <span class="link_name">Home</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{URL::route('frontend.index')}}">Home</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="{{URL::route('frontend.user.dashboard')}}">
                    <i class="fas fa-columns"></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{URL::route('frontend.user.dashboard')}}">Dashboard</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Categories</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Categories</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="{{ URL::route('frontend.user.livescore') }}">
                    <i class="fas fa-align-center"></i>
                    <span class="link_name">Livescore</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Livescore</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="{{ URL::route('frontend.user.ranking') }}">
                    <i class="fas fa-sort-numeric-down"></i>
                    <span class="link_name">Ranking</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{ URL::route('frontend.user.ranking') }}">Ranking</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="{{URL::route('frontend.posts')}}">
                    <i class="fa fa-newspaper-o" ></i>
                    <span class="link_name">Posts</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{URL::route('frontend.posts')}}">Posts</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="{{URL::route('frontend.user.filters')}}">
                    <i class="fas fa-sort"></i>
                    <span class="link_name">Filters</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{ URL::route('frontend.user.filters') }}">Filters</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="{{ route('frontend.user.compareteams') }}">
                    <i class="fas fa-greater-than"></i>
                    <span class="link_name">Compare Teams</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{ URL::route('frontend.user.compareteams') }}">Compare Teams</a>
                </li>
            </ul>
        </li>
        <li>
        <div class="iocn-link">
            <a href="{{ URL::route('frontend.user.compareplayers') }}">
                <i class="fas fa-sort-amount-up"></i>
                <span class="link_name">Compare Players</span>
            </a>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="{{ URL::route('frontend.user.compareplayers') }}">Compare Players</a>
            </li>
        </ul></li>
        <li>
            <div class="iocn-link">
                <a href="{{ route('frontend.user.standings') }}">
                    <i class="fas fa-table"></i>
                    <span class="link_name">Standings</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{ route('frontend.user.standings') }}">Standings</a>
                </li>
            </ul>
                <li>
                    <div class="iocn-link">
                        <a href="{{URL::route('frontend.faq')}}">
                            <i class="far fa-question-circle"></i>
                            <span class="link_name">FAQ</span>
                        </a>      
                  </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{URL::route('frontend.faq')}}">FAQ</a></li>
                </ul>
                </li>
            </ul>
      </div>
<section class="home-section">
    <div class="home-content">
        <button class="btnnav btnnav-icon btnnav-accent me-2 me-lg-6" id="hide-text" id="show-text">
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                    <rect y="6" width="16" height="3" rx="1.5" fill="black"></rect>
                    <rect opacity="0.3" y="12" width="8" height="3" rx="1.5" fill="black"></rect>
                    <rect opacity="0.3" width="12" height="3" rx="1.5" fill="black"></rect>
                </svg>
            </span>
        </button>
        <button class="btnnav btnnav-icon2 btnnav-accent me-2 me-lg-6" id="hide-text" id="show-text">
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                    <rect y="6" width="16" height="3" rx="1.5" fill="black"></rect>
                    <rect opacity="0.3" y="12" width="8" height="3" rx="1.5" fill="black"></rect>
                    <rect opacity="0.3" width="12" height="3" rx="1.5" fill="black"></rect>
                </svg>
            </span>
        </button>
    </div>
</section>

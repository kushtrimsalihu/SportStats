<div class="sidebar m-0 p-0" id="sidebar">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <ul class="list-unstyled components pt-0">
            <div id="admin-sidebar-header" class="p-2">
                 <a href="{{ route('frontend.index') }}">
                    @foreach(\App\Domains\Auth\Models\UpdateInformation::all() as $logo)
                      @if ($logo->icon != null)
                            <img src="{{asset('/uploads/logo/'.$logo->icon)}}" width="200px" height="55px" class="image_nav">
                           @elseif($logo->icon == null)
                           <img src="{{asset('/images/logo.png/')}}" width="200px" height="55px"  class="image_nav">
                           @endif
                
                @endforeach 
            </a>
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
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-columns"></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                </ul>
            </li>
    
            @if ($logged_in_user->hasAllAccess() || ($logged_in_user->can('admin.access.user.list') || $logged_in_user->can('admin.access.user.deactivate') || $logged_in_user->can('admin.access.user.reactivate') || $logged_in_user->can('admin.access.user.clear-session') || $logged_in_user->can('admin.access.user.impersonate') || $logged_in_user->can('admin.access.user.change-password')))
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class="far fa-user"></i>
                        <span class="link_name">Access</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="{{ route('admin.auth.user.index') }}">User</a></li>
                </ul>
            </li>
            @endif
            <li>
                 <a href="#"><div class="iocn-link">
                   
                        <i class="fas fa-database"></i>
                        <span class="link_name">Manage Data</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="{{ route('admin.auth.players.index') }}">Players</a></li>
                    <li><a href="{{ route('admin.auth.sports.index') }}">Sport</a></li>
                    <li><a href="{{ route('admin.auth.teams.index') }}">Teams</a></li>
                    <li><a href="{{ route('admin.auth.league.index') }}">League</a></li>
                    <li><a href="{{ route('admin.auth.position.index') }}">Position</a></li>
                    <li><a href="{{ route('admin.auth.statistics.index') }}">Statistics</a></li>
                    <li><a href="{{ route('admin.auth.dailyvote.index') }}">Daily Voting</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span class="link_name">Landin Page</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="{{ route('admin.auth.landing.index') }}">First View</a></li>
                    <li><a href="{{ route('admin.auth.aboutlanding.index') }}">About Us View</a></li>
                    <li><a href="{{ route('admin.auth.dashboardlanding.index') }}">Dashboard View</a></li>
                    <li><a href="{{ route('admin.auth.tabslanding.index') }}">Tabs View</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('admin.auth.about.index') }}">
                        <i class="fas fa-address-card"></i>
                        <span class="link_name">About Us</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('admin.auth.livescore.index') }}">
                        <i><img src="https://img.icons8.com/external-konkapp-detailed-outline-konkapp/50/000000/external-live-streaming-soccer-konkapp-detailed-outline-konkapp.png"/></i>
                        <span class="link_name">Livescore</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('admin.auth.faq.index') }}">
                        <i class="far fa-question-circle"></i>
                        <span class="link_name">Manage FAQ</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class="fab fa-blogger-b"></i>
                        <span class="link_name">Blog</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="{{ route('admin.auth.posts.index') }}">Post</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class="fas fa-crop-alt"></i>
                        <span class="link_name">Logo</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="{{ route('admin.auth.updateinformation.index') }}">Logo</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>

</div>
<!--sidebar-->

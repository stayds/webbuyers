<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

            <!-- <li class="d-none d-sm-block">
                 <form class="app-search">
                     <div class="app-search-box">
                         <div class="input-group">
                             <input type="text" class="form-control" placeholder="Search...">
                             <div class="input-group-append">
                                 <button class="btn" type="submit">
                                     <i class="mdi mdi-magnify"></i>
                                 </button>
                             </div>
                         </div>
                     </div>
                 </form>
             </li> -->

{{--            <li class="dropdown notification-list">--}}
{{--                <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">--}}
{{--                    <i class="mdi mdi-bell-ring noti-icon"></i>--}}
{{--                    {{$notify=null}}--}}
{{--                    @if($notify)<span class="badge badge-danger rounded-circle noti-icon-badge">9</span>@endif--}}
{{--                </a>--}}

{{--            </li>--}}

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('admin/images/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1 text-capitalize">
                                    {{Auth::guard('admin')->user()->fname}} <i class="mdi mdi-chevron-down"></i>
                                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <a href="{{route('password.change')}}" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i>
                        <span>Change Password</span>
                    </a>
                    <!-- item-->
                    <a href="{{route('admin.profile')}}" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i>
                        <span>Profile</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                        <i class="fa fa-power-off"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('admin.dashboard')}}" class="logo text-center">
                            <span class="logo-lg">
                                <img src="{{asset('admin/images/logo-light.png')}}" alt="" height="48">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
                                <img src="{{asset('admin/images/logo-light.png')}}" alt="" height="24">
                            </span>
            </a>
        </div>

    </div>
</div>

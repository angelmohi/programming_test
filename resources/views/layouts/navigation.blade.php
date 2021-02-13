<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                @if(Auth::user()->isAdmin())
                    <a href="/stafflist" class="logo">
                @else
                    <a href="/dashboard" class="logo">
                @endif
                
                    <span>Logo</span>
                </a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras navbar-topbar">

                <ul class="list-inline float-right mb-0">

                    <li class="list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="list-inline-item dropdown notification-list">

                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="nav-link dropdown-toggle waves-effect waves-light nav-user">
                                        <img src="{{ asset('assets/images/users/avatar.jpg') }}" alt="user" class="rounded-circle"> <h5 class="text-overflow"><small>{{ Auth::user()->name }}</small> </h5>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        
                        <!-- Settings Dropdown -->

                    </li>

                </ul>

            </div> <!-- end menu-extras -->
            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="active">
                        @if(Auth::user()->isAdmin())
                            <a href="/stafflist" title="Staff"><i class="fa fa-users"></i> <span> Staff</span> </a>
                        @else
                            <a href="/dashboard" title="Dashboard"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard</span> </a>
                        @endif
                        
                    </li>
                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
    
</header>
<!-- End Navigation Bar-->



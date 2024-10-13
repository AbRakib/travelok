<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{route('home')}}" class="navbar-brand">
                <h1 class="m-0 text-primary"><span class="text-dark">TRAVE</span>LOK</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link @if(Route::currentRouteName() == 'home') active @endif">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link @if(Route::currentRouteName() == 'about') active @endif">About</a>
                    <a href="{{ route('services') }}" class="nav-item nav-link @if(Route::currentRouteName() == 'services') active @endif">Services</a>
                    <a href="{{ route('packages') }}" class="nav-item nav-link @if(Route::currentRouteName() == 'packages') active @endif">Tour Packages</a>
                    <div class="nav-item dropdown">
                        <a 
                        href="#" 
                        class="nav-link dropdown-toggle @if((Route::currentRouteName() == 'blogs') || (Route::currentRouteName() == 'destination') || (Route::currentRouteName() == 'guide') || (Route::currentRouteName() == 'testimonial')) active @endif" 
                        data-toggle="dropdown"
                        >Pages</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="{{ route('blogs') }}" class="dropdown-item">Blog</a>
                            <a href="{{route('destination')}}" class="dropdown-item">Destination</a>
                            <a href="{{route('guide')}}" class="dropdown-item">Travel Guides</a>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="nav-item nav-link @if(Route::currentRouteName() == 'contact') active @endif">Contact</a>
                    <div class="nav-item dropdown">
                        <a 
                        href="#" 
                        class="nav-link dropdown-toggle @if((Route::currentRouteName() == 'logout.member') || (Route::currentRouteName() == 'register.member')) active @endif" 
                        data-toggle="dropdown"
                        >Auth</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            @auth
                                <a href="" class="dropdown-item">{{Auth::user()->name}}</a>
                                <a href="{{route('logout.member')}}" class="dropdown-item">Logout</a>
                            @endauth
                            @guest
                                <a href="{{ route('login.member') }}" class="dropdown-item">Login</a>
                                <a href="{{ route('register.member') }}" class="dropdown-item">Registration</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
              @if (Auth::user()->image)
                <img src="{{asset('uploads/images')}}/{{Auth::user()->image}}" alt="profile">
              @else
                <img src="{{asset('admin/assets/images/faces/face1.jpg')}}" alt="profile">
              @endif
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
            <span class="text-secondary text-small">Project Manager</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('tour.request')}}">
          <span class="menu-title">Tour Request</span>
          <i class="mdi mdi-inbox menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-package" aria-expanded="false" aria-controls="ui-package">
          <span class="menu-title">Tour Packages</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-wallet-travel"></i>
        </a>
        <div class="collapse" id="ui-package">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('package.index')}}">Package List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('package.create')}}">Package Add</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-destination" aria-expanded="false" aria-controls="ui-destination">
          <span class="menu-title">Tour Destination</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-google-maps"></i>
        </a>
        <div class="collapse" id="ui-destination">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('destination.index')}}">Destination List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('destination.create')}}">Destination Add</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-guides" aria-expanded="false" aria-controls="ui-guides">
          <span class="menu-title">Guides</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-television-guide"></i>
        </a>
        <div class="collapse" id="ui-guides">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('guide.index')}}">Guide List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('guide.create')}}">Guide Add</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-about" aria-expanded="false" aria-controls="ui-about">
          <span class="menu-title">About Us</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-spellcheck"></i>
        </a>
        <div class="collapse" id="ui-about">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('about.index') }}">About List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('about.create') }}">About Add</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-service" aria-expanded="false" aria-controls="ui-service">
          <span class="menu-title">Services</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-server-security"></i>
        </a>
        <div class="collapse" id="ui-service">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('service.index')}}">Service List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('service.active')}}">Service Active</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('service.pending')}}">Service Pending</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('service.create')}}">Service Add</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-blogs" aria-expanded="false" aria-controls="ui-blogs">
          <span class="menu-title">Blogs</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-book-open-page-variant"></i>
        </a>
        <div class="collapse" id="ui-blogs">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('blog.index')}}">Blogs List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('blog.create')}}">Blogs Add</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-user">
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-account-circle"></i>
        </a>
        <div class="collapse" id="ui-user">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">User List</a></li>
            <li class="nav-item"> <a class="nav-link" href="">User Pending</a></li>
            <li class="nav-item"> <a class="nav-link" href="">User Rejected</a></li>
            <li class="nav-item"> <a class="nav-link" href="">User Add</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-theme" aria-expanded="false" aria-controls="ui-theme">
          <span class="menu-title">Themes</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-account-circle"></i>
        </a>
        <div class="collapse" id="ui-theme">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('theme.index')}}">Theme List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('theme.create')}}">Theme Add</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Settings Pages</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-security"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('country.index')}}"> Countries </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('division.index')}}"> Divisions </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('district.index') }}"> Districts </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('setting.contact')}}"> Site Contacts </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> News Latter </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('settings')}}"> Settings </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item sidebar-actions">
        <span class="nav-link">
          <div class="border-bottom">
            <h6>Visit Your Website</h6>
          </div>
          <a href="{{route('home')}}" target="_blank" class="btn btn-block btn-lg btn-gradient-primary mt-2">Visit Now</a>
        </span>
      </li>
    </ul>
  </nav>
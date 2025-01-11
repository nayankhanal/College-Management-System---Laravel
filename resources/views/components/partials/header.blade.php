<header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{Storage::url(auth()->user()->image)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">
                @if(Auth::check())
                {{auth()->user()->name}}
                @endif
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{Storage::url(auth()->user()->image)}}" class="img-circle" alt="User Image">
                @if(Auth::check())
                <p>
                  {{auth()->user()->name}} - {{auth()->user()->role}}
                  <small>Member since Birth</small>
                </p>
                @endif
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('profiles.index')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-default btn-flat" onclick="return confirm('Are you sure you want to log out?')">Sign out</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
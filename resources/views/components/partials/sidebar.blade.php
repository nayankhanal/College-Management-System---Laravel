<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{Storage::url(auth()->user()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            @if(Auth::check())
            <p>{{auth()->user()->name}}</p>
            @endif
          <a href="#"><i class="fa fa-circle text-success"></i> {{auth()->user()->role}}</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if (auth()->user()->role == 'admin')
        <li>
          <a href="{{route('departments.index')}}">
            <i class="fa fa-regular fa-building"></i> <span>Departments</span>

          </a>
        </li>
        <li>
          <a href="{{route('users.index')}}">
            <i class="fa fa-solid fa-users"></i> <span>Users</span>

          </a>
        </li>
        <li>
          <a href="{{route('courses.index')}}">
            <i class="fa fa-solid fa-graduation-cap"></i> <span>Courses</span>

          </a>
        </li>
        <li>
          <a href="{{route('subjects.index')}}">
            <i class="fa fa-solid fa-book"></i> <span>Subjects</span>
          </a>
        </li>
        <li>
          <a href="{{route('students.index')}}">
            <i class="fa fa-solid fa-user"></i> <span>Students</span>
          </a>
        </li>
        <li>
          <a href="{{route('teachers.index')}}">   
            <i class="fa fa-solid fa-trophy"></i><span>Teachers</span>
          </a>
        </li>
        <li>
          <a href="{{route('enrollments.index')}}">  
            <i class="fa fa-regular fa-clipboard"></i> <span>Enrollments</span>
          </a>
        </li>
        @endif
        <li>
          <a href="{{route('assignments.index')}}">
            <i class="fa fa-solid fa-check"></i> <span>Assignments</span>
          </a>
        </li>
    </section>
  </aside>
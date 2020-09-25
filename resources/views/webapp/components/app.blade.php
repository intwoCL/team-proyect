@extends('webapp.components.skeleton')
@section('app')
    
<div class="main-wrapper">
  <div class="navbar-bg" style="height: 70px !important;"></div>
  <nav class="navbar navbar-expand-lg main-navbar ">
    {{-- sidebar-gone-hide  --}}
    <a href="{{ route('app.index') }}" class="navbar-brand mr-5 ml-3">TEAM</a>
    <div class="nav-collapse d-none d-lg-block">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a href="{{ route('app.index') }}" class="nav-link">
            <i class="fa fa-home mr-2"></i>
            <strong>INICIO</strong>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('app.calendar',[date('m'),date('Y')]) }}" class="nav-link">
            <i class="fa fa-calendar-alt mr-2"></i>
            <strong>CALENDAR</strong>
          </a>
        </li>
      </ul>
    </div>
    <ul class="ml-auto navbar-nav navbar-right">
      {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
          class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
          <div class="dropdown-header">Messages
            <div class="float-right">
              <a href="#">Mark All As Read</a>
            </div>
          </div>
          <div class="dropdown-list-content dropdown-list-message">
            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-avatar">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                <div class="is-online"></div>
              </div>
              <div class="dropdown-item-desc">
                <b>Kusnaedi</b>
                <p>Hello, Bro!</p>
                <div class="time">10 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-avatar">
                <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
              </div>
              <div class="dropdown-item-desc">
                <b>Dedik Sugiharto</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <div class="time">12 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-avatar">
                <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                <div class="is-online"></div>
              </div>
              <div class="dropdown-item-desc">
                <b>Agung Ardiansyah</b>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="time">12 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="dropdown-item-avatar">
                <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
              </div>
              <div class="dropdown-item-desc">
                <b>Ardian Rahardiansyah</b>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                <div class="time">16 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="dropdown-item-avatar">
                <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
              </div>
              <div class="dropdown-item-desc">
                <b>Alfa Zulkarnain</b>
                <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                <div class="time">Yesterday</div>
              </div>
            </a>
          </div>
          <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </li> --}}
      {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
          class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
          <div class="dropdown-header">Notifications
            <div class="float-right">
              <a href="#">Mark All As Read</a>
            </div>
          </div>
          <div class="dropdown-list-content dropdown-list-icons">
            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-icon bg-primary text-white">
                <i class="fas fa-code"></i>
              </div>
              <div class="dropdown-item-desc">
                Template update is available now!
                <div class="time text-primary">2 Min Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="dropdown-item-icon bg-info text-white">
                <i class="far fa-user"></i>
              </div>
              <div class="dropdown-item-desc">
                <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                <div class="time">10 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="dropdown-item-icon bg-success text-white">
                <i class="fas fa-check"></i>
              </div>
              <div class="dropdown-item-desc">
                <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                <div class="time">12 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="dropdown-item-icon bg-danger text-white">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
              <div class="dropdown-item-desc">
                Low disk space. Let's clean it!
                <div class="time">17 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="dropdown-item-icon bg-info text-white">
                <i class="fas fa-bell"></i>
              </div>
              <div class="dropdown-item-desc">
                Welcome to Stisla template!
                <div class="time">Yesterday</div>
              </div>
            </a>
          </div>
          <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </li> --}}
      <li class="dropdown"><a href="#" data-toggle="dropdown"
          class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="{{ current_user()->present()->getPhoto() }}" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">{{ current_user()->present()->getFullName() }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
          <a href="{{ route('app.profile') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          {{-- <a href="#" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a> --}}
          <div class="custom-control custom-switch nav-link">
            <input type="checkbox" class="custom-control-input" id="darkSwitch">
            <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
          </div>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i>{{ trans('t.logout') }}
          </a>
        </div>
      </li>
    </ul>
  </nav>
  @yield('content')
  <footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; 2018 <div class="bullet"></div>
    </div>
    <div class="footer-right">
      0.1.1
    </div>
  </footer>
</div>
@endsection

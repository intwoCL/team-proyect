<form class="form-inline mr-auto" action="">
  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
  </ul>
</form>
<ul class="navbar-nav navbar-right">
  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <div class="d-sm-none d-lg-inline-block">{{ trans('t.hi') }}, {{ current_user()->present()->getFullName() }}</div></a>
    <div class="dropdown-menu dropdown-menu-right">
      <div class="dropdown-title">{{ trans('t.welcome') }}, {{ current_user()->present()->getFullName() }}</div>
      <a href="{{ route('user.profile') }}" class="dropdown-item has-icon">
        <i class="far fa-user"></i>{{ trans('t.profile_settings') }}
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i>{{ trans('t.logout') }}
      </a>
    </div>
  </li>
</ul>

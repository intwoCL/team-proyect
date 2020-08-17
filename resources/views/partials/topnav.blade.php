<form class="form-inline mr-auto" action="">
  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
  </ul>
</form>
<ul class="navbar-nav navbar-right">
  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <div class="d-sm-none d-lg-inline-block">Hi, {{ current_user()->getFullName() }}</div></a>
    <div class="dropdown-menu dropdown-menu-right">
      <div class="dropdown-title">Welcome, {{ current_user()->getFullName() }}</div>
      <a href="{{ route('user.profile') }}" class="dropdown-item has-icon">
        <i class="far fa-user"></i> Profile Settings
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ route('login') }}" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout salir
      </a>
    </div>
  </li>
</ul>

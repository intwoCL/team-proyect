@php
  function active($url){
    return request()->is($url) ? 'active' : '';
  }
  function open($url){
    return request()->is($url) ? 'menu-open' : '';
  }  
@endphp
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="#">{{ strtoupper(substr(env('APP_NAME'), 0, 2)) }}</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ active('dashboard') }}"><a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
    <li class="{{ active('activity*') }}"><a href="{{ route('activity.index') }}"><i class="fab fa-wpforms"></i> <span>Actividades</span></a></li>
    <li class="{{ active('user*') }}"><a href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>Usuarios</span></a></li>
    <li class="{{ active('calendar*') }}"><a href="{{ route('calendar.index') }}"><i class="fas fa-calendar-alt"></i> <span>Calendar</span></a></li>
    <li class="{{ active('assignment*') }}"><a href="{{ route('assignment.index') }}"><i class="fas fa-hands-helping"></i><span>Asociar</span></a></li>
  </ul>
</aside>

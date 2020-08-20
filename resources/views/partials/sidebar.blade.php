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
    <li class="menu-header">{{ trans('t.dashboard') }}</li>
    <li class="{{ active('dashboard') }}"><a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-columns"></i> <span>{{ trans('t.dashboard') }}</span></a></li>
    <li class="{{ active('activity*') }}"><a href="{{ route('activity.index') }}"><i class="fab fa-wpforms"></i> <span>{{ trans('t.activities') }}</span></a></li>
    <li class="{{ active('user*') }}"><a href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>Usuarios</span></a></li>
    <li class="{{ active('assignment*') }}"><a href="{{ route('assignment.index') }}"><i class="fas fa-hands-helping"></i><span>{{ trans('t.specialist') }}</span></a></li>
    <li class="{{ active('attention*') }}"><a href="{{ route('attention.index') }}"><i class="fas fa-hands-helping"></i><span>{{ trans('t.attention') }}</span></a></li>
    <li class="{{ active('calendar*') }}"><a href="{{ route('calendar.index') }}"><i class="fas fa-calendar-alt"></i> <span>{{ trans('t.calendar') }}</span></a></li>
      
    @if (is_specialist())
    <li class="menu-header">Starter</li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
        <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
        <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
      </ul>
    </li>  
    @endif
 
 
    <hr>
    <li><a href="/webapp" class="bg-success text-white"><i class="fas fa-mobile-alt"></i> <span>{{ trans('t.app') }}</span></a></li>
  </ul>
</aside>

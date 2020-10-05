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
    <a href="">Programa TEAM</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="#">PTEAM</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">{{ trans('t.dashboard') }}</li>
    <li class="{{ active('dashboard') }}">
      <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-columns"></i> <span>{{ trans('t.dashboard') }}</span></a>
    </li>
    <li class="{{ active('activity*') }}">
      <a href="{{ route('activity.index') }}"><i class="fas fa-puzzle-piece"></i> <span>{{ trans('t.activities') }}</span></a>
    </li>
    @if (current_user()->admin)     
    <li class="{{ active('user*') }}">
      <a href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>Usuarios</span></a>
    </li>
    <li class="{{ active('assignment*') }}">
      <a href="{{ route('assignment.index') }}"><i class="fas fa-hands-helping"></i> <span>{{ trans('t.specialist') }}</span></a>
    </li>
    @endif
    
    <li class="{{ active('calendar*') }}">
      <a href="{{ route('calendar.index') }}"><i class="fas fa-calendar-alt"></i> <span>{{ trans('t.calendar') }}</span></a>
    </li>
      
    @if (is_specialist())
    <li class="menu-header">Especialista</li>
    <li class="{{ active('attention*') }}">
      <a href="{{ route('attention.index') }}"><i class="fas fa-calendar-alt"></i> <span>{{ trans('t.attention') }}</span></a>
    </li>
    <li class="{{ active('enrollment*') }} {{ active('schedule*') }}">
      <a href="{{ route('enrollment.index') }}"><i class="fas fa-users"></i> <span>Usuarios</span></a>
    </li>

    @endif
 
 
    <hr>
    <li><a href="/webapp" class="bg-success text-white"><i class="fas fa-mobile-alt"></i> <span>{{ trans('t.app') }}</span></a></li>
  </ul>
</aside>

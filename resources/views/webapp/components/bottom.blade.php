
{{--  --}}
<nav class="navbar fixed-bottom navbar-dark bg-primary d-none d-sm-block d-md-none d-flex justify-content-center" style="position: fixed; bottom: 0px;left: 0px; height: 60px !important;">
  <a class="navbar-brand pl-3 pr-2" href="{{ route('app.index') }}" title="Home"><i class="fa fa-home"></i></a>
  <a class="navbar-brand pl-5 pr-2" href="{{ route('app.calendar',[date('m'),date('Y')]) }}" title="Calendar"><i class="fa fa-calendar-alt"></i></a>
  <a class="navbar-brand pl-5 pr-3" href="#" title="Profile"><i class="fa fa-user"></i></a>
</nav>
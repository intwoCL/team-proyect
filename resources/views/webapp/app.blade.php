  @extends('layouts.skeleton')

  @section('app')
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('partials.webapptopnav')
      </nav>
      <div class="main-sidebar">
        @include('partials.webappsidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      {{-- <footer class="main-footer">
        @include('partials.webappfooter')
      </footer> --}}
    </div>
 
  @endsection
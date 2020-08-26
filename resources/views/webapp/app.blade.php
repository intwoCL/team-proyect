@extends('webapp.components.skeleton')
@push('stylesheet')

<style>
  .card-horizontal {
    display: flex;
    flex: 1 1 auto;
  }
  .card-items-shadow {
    box-shadow: 2px 1px 2px #716f6f !important;
  }
</style>
@endpush
@section('app')
<div class="main-wrapper container">
  <div class="navbar-bg" style="height: 70px !important;"></div>
  <nav class="navbar navbar-expand-lg main-navbar container ">
    {{-- <a href="index.html" class="navbar-brand sidebar-gone-hide">TEAM</a> --}}
    <div class="navbar-nav">
      <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse d-none d-lg-block">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav">
        <li class="nav-item active"><a href="#" class="nav-link"><i class="fa fa-home mr-2"></i><strong>INICIO</strong></a></li>
        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-calendar-alt mr-2"></i><strong>CALENDAR</strong></a></li>
      </ul>
    </div>
    <ul class="ml-auto navbar-nav navbar-right">
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
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
      </li>
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
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
      </li>
      <li class="dropdown"><a href="#" data-toggle="dropdown"
          class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged in 5 min ago</div>
          <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
          </a>
          <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>

  <nav class="navbar navbar-secondary navbar-expand-lg d-none d-sm-block d-md-none d-flex">
    <div class="container">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
              class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
            <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
          </ul>
        </li>
        <li class="nav-item active">
          <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="" style="padding-top: 100px !important;">
    <section class="section">
      <div class="section-header">
        <h1>Top Navigation</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Layout</a></div>
          <div class="breadcrumb-item">Top Navigation</div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row">

        @for ($i=0; $i < 10; $i++)
          @include('webapp.components._card')
        @endfor
      </div>
    </div>
  </div>



  <footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
    </div>
    <div class="footer-right">
      2.3.0
    </div>
  </footer>
</div>
@endsection
@push('footerNav')
{{-- @include('webapp.navbar.top') --}}
@include('webapp.components.bottom')
@endpush
@push('javascript')
<script>
  $(document).ready(function() {
    $(".card-items").hover(
      function() {
        $(this).addClass('card-items-shadow').css('cursor', 'pointer'); 
      }, function() {
        $(this).removeClass('card-items-shadow');
      }
    );
    value(swiper);
  });


  function activityShow(id){
    // alert('Error ' + id);
    window.location.href = "{{ route('web') }}";
  }
</script>
@endpush
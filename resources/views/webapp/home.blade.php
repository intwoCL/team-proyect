@extends('webapp.app')

@section('title', 'Admin Dashboard')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/swiper/css/swiper-bundle.min.css">
  {{-- <style>
    .swiper-container {
      width: 600px;
      height: 100%;
    }
  </style> --}}

  <style>

#progress {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    background-color: #f3f3f3;
    height: 10px;
    z-index: 100;
}

  </style>
@endpush
@section('content')
  {{-- <section class="section">
    <div class="section-header">
      <a href="#" onclick="buttonSound()">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1><div class="swiper-pagination"></div></h1>
    </div>
  </section> --}}
  <div class="section">
    <div class="swiper-container swiper-slider" data-pagination-type='progress'>
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          @include('webapp.card._quiz')
        </div>
        <div class="swiper-slide">
          @include('webapp.card._gif')
        </div>
        <div class="swiper-slide">
          @include('webapp.card._text')
        </div>
        <div class="swiper-slide">
          @include('webapp.card._youtube')
        </div>
        {{-- <div class="swiper-slide">
          @include('webapp.card._youtube')
        </div>
        <div class="swiper-slide">
          @include('webapp.card._youtube')
        </div> --}}
      </div>
      <!-- Add Pagination -->
      <!-- Add Arrows -->
      {{-- <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div> --}}
    </div>
  </div>

  <div style="display: none;">
    <audio id="fx-back" src="/fx/effects/bottle-cork.mp3" data-url="/dashboard"></audio>
    <audio id="fx-slider" controls> <source type="audio/mp3" src="/fx/effects/swoosh.mp3"></audio>
  </div>
@endsection
@push('javascript')
<script src="/vendor/swiper/js/swiper-bundle.min.js"></script>
<script>
  var btnSlider = document.getElementById("fx-slider");
  btnSlider.volume = 0.5;

  var swiper = new Swiper('.swiper-container', {
    // pagination: {
      // el: '.swiper-pagination',
      // type: 'bullets',
      // type: 'progressbar',
      // type: 'fraction',
    // },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    }
  });

  swiper.on('slideNextTransitionStart', function () {
    btnSlider.play();
    value(this);
  });
  
  swiper.on('slidePrevTransitionStart', function () {
    btnSlider.play();
    value(this);
  });
  
  function value(s){
    var actual = s.activeIndex + 1;
    var largo = s.slidesGrid.length;
    var por = (actual/largo) * 100;
    $('#barProgress')[0].dataset['valuenow'] = por;
    $('#barProgress')[0].dataset['width'] = por+"%";
    $('#barProgress')[0].style.width = por+"%";
  }
  
  value(swiper);

  // button back 
  var btnBack = document.getElementById("fx-back");
  function buttonSound(){
    btnBack.volume = 0.5;
    btnBack.play();
  }
  btnBack.addEventListener("ended", function(){
    window.location.href = btnBack.dataset.url;
  });
</script>
@endpush
@push('footerApp')
<nav class="navbar fixed-top navbar-dark bg-primary d-none d-sm-block d-md-none d-flex" style="position: fixed;bottom: 0;left: 0;">
  <div class="navbar-brand">
    <div class="progress" id="progress">
      <div class="progress-bar bg-success" id="barProgress" role="progressbar" data-width="20%" data-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
    </div>
  </div>
  <a class="navbar-brand btn-sm mr-2 col-sm-2" href="#" onclick="buttonSound()" title="Search">
    <i class="fas fa-times-circle"></i>
  </a>
</nav>
<nav class="navbar fixed-bottom navbar-dark bg-primary d-none d-sm-block d-md-none d-flex justify-content-center" style="position: fixed; bottom: 0;left: 0; height: 50px;">
  <a class="navbar-brand btn-sm pl-2 pr-2" href="#" title="Search"><i class="fas fa-search"></i></a>
  <a class="navbar-brand btn-sm pl-2 pr-2" href="#" title="Home"><i class="fa fa-home"></i></a>
  <a class="navbar-brand btn-sm pl-2 pr-2" href="#" title="Favorite"><i class="fa fa-star"></i></a>
</nav>
@endpush



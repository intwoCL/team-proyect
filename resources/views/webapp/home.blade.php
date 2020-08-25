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
      height: 15px;
      z-index: 100;
    }
    .face-shadow {
      text-shadow: 1px 2px 4px #4b4a4a !important;
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
        <div class="swiper-slide">
          @include('webapp.card._youtube')
        </div>
        <div class="swiper-slide">
          @include('webapp.card._youtube')
        </div>
        <div class="swiper-slide">
          @include('webapp.card._quiz')
        </div>
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

  // button back 
  var btnBack = document.getElementById("fx-back");
  function buttonSound(){
    btnBack.volume = 0.5;
    btnBack.play();
  }

  btnBack.addEventListener("ended", function(){
    window.location.href = btnBack.dataset.url;
  });

  $(document).ready(function() {
    $(".face").hover(
      function() {
        $(this).addClass('face-shadow').css('cursor', 'pointer'); 
      }, function() {
        $(this).removeClass('face-shadow');
      }
    );
    value(swiper);
  });
</script>
@endpush
@push('footerApp')
@include('webapp.navbar.top')
{{-- @include('webapp.navbar.bottom') --}}
@endpush



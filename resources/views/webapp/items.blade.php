@extends('webapp.components.skeleton')
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
@section('app')
<div class="main-wrapper container">
 

  <div class="section">
    <div class="swiper-container swiper-slider" data-pagination-type='progress' style="margin-top: 100px;">
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
    <audio id="fx-back" src="/fx/effects/bottle-cork.mp3" data-url="/activity"></audio>
    <audio id="fx-slider" controls> <source type="audio/mp3" src="/fx/effects/swoosh.mp3"></audio>
  </div>



</div>
@endsection
@push('footerNav')
@include('webapp.components.top')
{{-- @include('webapp.components.bottom') --}}
@endpush
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

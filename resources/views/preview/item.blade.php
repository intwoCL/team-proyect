@extends('webapp.components.skeleton')
@push('stylesheet')
<link rel="stylesheet" href="/vendor/swiper/css/swiper-bundle.min.css">

<style>
  #progress {
    position: absolute;
    left: 15%;
    right: 15%;
    top: 25px;
    background-color: #f3f3f3;
    height: 25px;
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
    <div class="swiper-container" data-pagination-type='progress' style="margin-top: 100px;">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          {{-- 1 => 'URL', 2 => 'Video', 3 => 'Imagen', 4 => 'Audio', 5 => 'Texto', --}}
          @switch($item->type)
            @case(1)
              @include('webapp.components.swiper._url')
              @break
            @case(2)
              @include('webapp.components.swiper._youtube')
              @break
            @case(3)
              @include('webapp.components.swiper._image')
              @break
            @case(4)
              @include('webapp.components.swiper._audio')
              @break
            @case(5)
              @include('webapp.components.swiper._text')
              @break
            @default
          @endswitch     
        </div>
      </div>
    </div>
  </div>
</div>

<div style="display: none;">
  <audio id="fx-back"><source type="audio/mp3" src="/fx/effects/bottle-cork.mp3"></audio>
  <audio id="fx-slider" controls> <source type="audio/mp3" src="/fx/effects/swoosh.mp3"></audio>
  <audio id="fx-finish" data-url="/webapp"> <source type="audio/wav" src="/fx/effects/Warm_Interface_Sound_7.wav"></audio>
</div>

@endsection
@push('footerNav')
@include('webapp.components.top')
{{-- @include('webapp.components.bottom') --}}
@endpush
@push('javascript')
<script src="/vendor/swiper/js/swiper-bundle.min.js"></script>
<script>
  // var btnSlider = document.getElementById("fx-slider");
  // btnSlider.volume = 0.5;

  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    }
  });

  // swiper.on('slideNextTransitionStart', function () {
  //   btnSlider.play();
  //   value(this);
  // });
  
  // swiper.on('slidePrevTransitionStart', function () {
  //   btnSlider.play();
  //   value(this);
  // });
  
  function value(s){
    var actual = s.activeIndex + 1;
    var largo = s.slidesGrid.length;
    var por = (actual/largo) * 100;
    $('#barProgress')[0].dataset['valuenow'] = por;
    $('#barProgress')[0].dataset['width'] = por+"%";
    $('#barProgress')[0].style.width = por+"%";

    console.log("a " + actual + "  - largo " + largo + "  por" + por);
  }

  // button back 
  var btnBack = document.getElementById("fx-back");
  var btnFinish = document.getElementById("fx-finish");
  
  function buttonSound(){
    btnBack.volume = 0.5;
    btnBack.play();
  }

  // function buttonFinish(){
  //   var comment = document.getElementById("comment");
  //   console.log(comment);
  //   // btnFinish.volume = 0.5;
  //   btnFinish.play();
  // }
  // btnFinish.addEventListener("ended", function(){
  //   window.location.href = btnFinish.dataset.url;
  // });

  btnBack.addEventListener("ended", function(){
    // window.location.href = btnBack.dataset.url;
    window.location.href = "{{ $back }}";
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

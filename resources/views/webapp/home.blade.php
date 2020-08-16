@extends('webapp.app')

@section('title', 'Admin Dashboard')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/swiper/css/swiper-bundle.min.css">
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <a href="#" onclick="buttonSound()">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Dashboardasdasd</h1>
    </div>
  </section>
  <div class="section">
    <div class="swiper-container">
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
      </div>
      <!-- Add Pagination -->
      <!-- Add Arrows -->
      {{-- <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div> --}}
    </div>
  </div>

  <div style="display: none;">
    <audio id="fx-back" src="/fx/effects/bottle-cork.mp3" data-url="/dashboard"></audio>

    <audio id="fx-slider" controls>
      <source type="audio/mp3" src="/fx/effects/swoosh.mp3">
    </audio>
  </div>
@endsection
@push('javascript')
<script src="/vendor/swiper/js/swiper-bundle.min.js"></script>
<script>
    var btnSlider = document.getElementById("fx-slider");
    btnSlider.volume = 0.6;

    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    // swiper.on('slideChange', function (e) {
    //   console.log('slide changed' + e);
    // });
    // swiper.on('slideChangeTransitionStart', function (e) {
    //   console.log('slideChangeTransitionStart' + e);
    // });
    // swiper.on('slideChangeTransitionEnd', function (e) {
    //   console.log('slideChangeTransitionEnd' + e);
    // });
    swiper.on('slideNextTransitionStart', function (e) {
      // console.log('slideNextTransitionStart' + e);
      // btnBack.stop();
      btnSlider.play();
    });
    swiper.on('slidePrevTransitionStart', function (e) {
      // console.log('slidePrevTransitionStart' + e);
      // btnBack.stop();
      btnSlider.play();
    });
    


    

</script>
<script>
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




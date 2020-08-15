@extends('webapp.app')

@section('title', 'Admin Dashboard')
@push('stylesheet')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endpush
@section('content')
  {{-- <section class="section">
    @include('partials.alert')

    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

  
  </section> --}}
  <div class="section">
    <div class="swiper-container">
      <div class="swiper-wrapper">
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
@endsection
@push('javascript')
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
      },
      // navigation: {
      //   nextEl: '.swiper-button-next',
      //   prevEl: '.swiper-button-prev',
      // },
    });
</script>
@endpush

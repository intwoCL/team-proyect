@extends('webapp.components.app')
@push('stylesheet')

<style>
  .card-horizontal {
    display: flex;
    flex: 1 1 auto;
  }
  .card-items-shadow {
    box-shadow: 2px 2px 2px #716f6f !important;
  }
</style>
@endpush
@section('content')
<div class="container" style="padding-top: 90px !important;">
  <section class="section">
    <div class="section-header">
      <h1>{{ trans('t.activities') }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">{{ date('d-m-Y') }}</div>
      </div>
    </div>
    <h2 class="section-title">LUNES</h2>
    <p class="section-lead">
      {{-- Form validation using default from Bootstrap 4 --}}
    </p>
  </section>
  <div class="row">
    @foreach ($activities as $a)
      {{-- @include('webapp.components._card') --}}
      @include('webapp.components._article')

    @endforeach
  </div>
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
</script>
@endpush
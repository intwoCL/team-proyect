    
@php
    // $days = array( 
    //   1 => 'LUNES',
    //   2 => 'MARTES',
    //   3 => 'MIERCOLES',
    //   4 => 'JUEVES',
    //   5 => 'VIERNES',
    //   6 => 'SABADO',
    //   7 => 'DOMINGO'
    // );
    $days = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SÁBADO','DOMINGO'];
@endphp
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
      <h1>Actividades</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">{{ date('d-m-Y') }}</div>
      </div>
    </div>
  </section>
  <div class="row">
    @foreach ($calendar_activities as $key => $value)
      <div class="col-12">
        <h2>{{ $days[$key] }}</h2>
      </div>
      {{-- <div class="col-12"> --}}
        @foreach ($value as $horario)
          @php
          $a = $horario->activity;
          $times = $horario->times;
          @endphp
        
          @include('webapp.components._article')
        @endforeach
      {{-- </div> --}}
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
  });
</script>
@endpush
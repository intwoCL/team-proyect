    
@php
    $date = \Carbon\Carbon::now();
    $numberDay = $date->isoFormat('E');
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
      <h1>Actividades <a href="#{{ $days[$numberDay-1] }}" class="btn btn-info">Hoy</a></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">{{ date('d-m-Y') }}</div>
      </div>
    </div>
  </section>
  <div class="row">
    @forelse ($Schedule_days as $key => $value)
      <div class="col-12" id="{{ $days[$key] }}">
        <h2>
          @if ($key+1==$numberDay)
            <i class="fa fa-star text-warning"></i> 
          @endif
          {{ $days[$key] }}
        </h2>
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
      <div class=""></div>
    @empty
    
    @endforelse
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
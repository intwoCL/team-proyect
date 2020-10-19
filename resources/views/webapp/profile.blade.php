@extends('webapp.components.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container" style="padding-top: 90px !important;">
  <section class="section">
    <div class="section-header">
      <h1>Perfil</h1>
      <div class="section-header-breadcrumb">
        {{-- <div class="breadcrumb-item">{{ date('d-m-Y') }}</div> --}}
      </div>
    </div>
    {{-- <h2 class="section-title">LUNES</h2> --}}
    <p class="section-lead">
      {{-- Form validation using default from Bootstrap 4 --}}
      @include('components.card._profile')

      <img onclick="smartsupp('chat:open');">
      <a href="#" onclick="smartsupp('chat:open'); return false;" class="btn btn-info"> <i class="fa fa-support"></i> Chat de soporte</a>
    </p>
    
  </section>
  <div class="row">
   
  </div>
</div>
@endsection
@push('footerNav')
@include('webapp.components.bottom')
@endpush
@push('javascript')
@include('partials._chat')
@endpush
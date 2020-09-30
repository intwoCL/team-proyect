@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Bienvenido {{ current_user()->present()->getFullname() }}</h1>
    {{-- <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Components</a></div>
      <div class="breadcrumb-item">Article</div>
    </div> --}}
  </div>  
</section>





@endsection
@push('javascript')
@include('partials._integrations')
@endpush
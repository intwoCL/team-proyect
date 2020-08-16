@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <section class="section">
    @include('partials._alert')

    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
    </div>
  </section>
@endsection
{{-- @push('javascript')  
  <script>
    iziToast.show({
      title: 'Hey',
      message: 'What would you like to add?'
    });
  </script>
@endpush --}}
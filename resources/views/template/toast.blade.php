@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    
    <div class="section-body">
      @include('partials._alert')
    </div>
  </section>
  <section class="section">

  </section>
@endsection
@push('javascript')
<script>

</script>
@endpush
@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{route('content.show',[$a->id,$c->id])}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>{{trans('t.activity.show.title')}} </h1>
    <div class="section-header-button">
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Vista Previa Item</h2>
    <p class="section-lead">Item</p>
    <div class="card">
      <div class="card-body">
        @include('webapp.components.swiper._text')
      </div>
    </div>
  </div>
</section>
@endsection

@push('javascript')
<script>

</script>
@endpush

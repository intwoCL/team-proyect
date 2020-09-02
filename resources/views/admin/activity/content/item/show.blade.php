@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{ route('activity.show',$content->activity->id) }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>{{trans('t.activity.show.title')}} </h1>
    <div class="section-header-button">
      {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
      <button onClick="window.location.href='{{ route('item.create',[$content->activity->id,$content->id]) }}'"
        class="btn btn-primary">Ver Item</button>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Vista Previa Item</h2>
    <p class="section-lead">Item</p>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <div class="card-header">
            <h4>Titulo</h4>
          </div>
          <div class="card-body">
            @include('webapp.components.swiper._text')
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary">{{trans('button.save')}}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('javascript')
<script>

</script>
@endpush

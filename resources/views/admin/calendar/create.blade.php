@extends('layouts.app')

@section('content')

<section class="section">
  <div class="section-header">
    <a href="{{ route('calendar.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Creación de calendario </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div>
  </div>

  <div class="section-body">
    {{-- <h2 class="section-title">Form Validation</h2>
    <p class="section-lead">
      Form validation using default from Bootstrap 4
    </p> --}}
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._alert')
        @include('partials._errors')
        <div class="card">       
          <form action="{{route('calendar.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="card-header">
              <h4>Calendario de actividades</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" required="" autocomplete="off" value="{{ old('name')}}">
              </div>
              <div class="form-group">
                <label>Objetivo</label>
                <input type="text" name="objective" class="form-control" required="" autocomplete="off" value="{{ old('objective')}}">
              </div>

              {{-- <div class="form-group">
                <div class="control-label">¿Desea quiz al final? <small class="text-danger">*</small></div>
                <label class="custom-switch mt-2">
                  <input type="checkbox" name="quiz" class="custom-switch-input">
                  <span class="custom-switch-description mr-2">No</span>
                  <span class="custom-switch-indicator"></span>
                  <span class="custom-switch-description">Si</span>
                </label>
              </div> --}}

            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{trans('t.activity.create.submit')}}</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</section>
@endsection
@push('javascript')
  <script>
    iziToast.show({
      title: 'Hey',
      message: 'What would you like to add?'
    });
  </script>
@endpush

@extends('layouts.app')

@section('content')


<section class="section">
  <div class="section-header">
    <a href="{{route('activity.show',$content->activity->id)}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Editar Contenido</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Form Validation</h2>
    <p class="section-lead">
      Form validation using default from Bootstrap 4
    </p>

    <div class="row">
      
      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._alert')
        @include('partials.errors')
        <div class="card">       
          <form action="{{route('content.edit',[$content->activity->id,$content->id])}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="activity_id" value="{{$content->activity->id}}"> 
            <div class="card-header">
              <h4>Default Validation</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Nombre contenido</label>
                <input type="text" name="name" class="form-control" required="" autocomplete="off">
              </div>

              <div class="form-group">
                <div class="control-label">¿Desea quiz al final? <small class="text-danger">*</small></div>
                <label class="custom-switch mt-2">
                  <input type="checkbox" name="quiz" class="custom-switch-input">
                  <span class="custom-switch-description mr-2">No</span>
                  <span class="custom-switch-indicator"></span>
                  <span class="custom-switch-description">Si</span>
                </label>
              </div>

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

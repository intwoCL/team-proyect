@extends('layouts.app')
@push('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
  .table.table-bordered td, .table.table-bordered th {
    border-color: #000 !important;
  }
  .table-bordered, .table-bordered td, .table-bordered th {
    border: 2px solid #000 !important;
  }
</style>    
@endpush
@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{ route('activity.show',$activity->id) }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>{{trans('t.content.create.title')}}</h1>
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
        @include('partials._errors')
        <div class="card">       
          <form action="{{route('content.store',$activity->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="activity_id" value="{{$activity->id}}"> 
            <div class="card-header">
              <h4>Default Validation</h4>
            </div>
            <div class="card-body">

              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">Nombre contenido</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" required="" autocomplete="off" value="{{ old('name')}}">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-12 col-form-label">Objetivo</label>
                <div class="col-sm-12">
                  <textarea name="objective" class="ckeditor" id="summernote">{!! old('objective') !!}</textarea>
                </div>  
              </div>

              <div class="form-group row">
                <div class="control-label">¿Desea quiz al final? <small class="text-danger">*</small></div>
                <div class="col-sm-9">
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="quiz" class="custom-switch-input">
                    <span class="custom-switch-description mr-2">No</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Si</span>
                  </label>
                </div>
              </div>

            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{trans('button.save')}}</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $('#summernote').summernote({
    placeholder: 'Hello stand alone ui',
    tabsize: 10,
    height: 120,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
    ],
    styleTags: [
    'p',
    { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
	  ],
  });
</script>
@endpush

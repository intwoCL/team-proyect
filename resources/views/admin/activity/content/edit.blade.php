@extends('layouts.app')

@push('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{route('activity.show',$content->activity->id)}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Editar Contenido</h1>
    {{-- <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div> --}}
  </div>

  <div class="section-body">
    {{-- <h2 class="section-title">Form Validation</h2>
    <p class="section-lead">
      Form validation using default from Bootstrap 4
    </p> --}}

    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._errors')
        <div class="card">
          <form action="{{route('content.edit',[$content->activity->id,$content->id])}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <input type="hidden" name="activity_id" value="{{$content->activity->id}}">
            <div class="card-header">
              <h4>Fomulario de edición</h4>
            </div>
            <div class="card-body">

              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">Nombre contenido</label>
                <div class="col-sm-9">
                  <input type="text" name="name" value="{{$content->name}}" class="form-control" required="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">Objetivo</label>
                <div class="col-sm-9">
                    <textarea name="objective" class="ckeditor" id="summernote">{{$content->objective}}</textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="control-label">¿Desea quiz al final? <small class="text-danger">*</small></div>
                <div class="col-sm-9">
                  <label class="custom-switch mt-2">
                    @php
                      $checked ='';
                      if($content->quiz){$checked = 'checked';}
                    @endphp
                    <input type="checkbox" name="quiz" class="custom-switch-input" {{$checked}}>
                    <span class="custom-switch-description mr-2">No</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Si</span>
                  </label>
                </div>
              </div>

            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{trans('button.update')}}</button>
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
    disableDragAndDrop: true,
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

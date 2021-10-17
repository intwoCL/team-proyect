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
    <a href="{{ route('activity.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Formulario de creación de actividades</h1>
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
          <div class="card-header">
            <h4>Formulario de creación de actividades</h4>
          </div>
          <form action="{{route('activity.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">{{trans('t.activity.create.name')}}</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" required="" autocomplete="off" value="{{ old('name')}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-12 col-form-label">{{trans('t.activity.create.objective')}}</label>
                <div class="col-sm-12">
                  {{-- <input type="text" name="objective" class="form-control" required="" autocomplete="off" value="{{ old('objective')}}"> --}}

                  <textarea name="objective" class="ckeditor" id="summernote" required>{{old('objective')}}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">{{trans('t.activity.create.photo')}}</label>
                <div class="col-sm-9">
                  <!-- <img src=""  class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""> -->
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              <div class="form-group center-text">
                  <div id="preview"></div>
              </div>

              <div class="form-group row">
                <label for="inputScale" class="col-sm-3 col-form-label">{{trans('t.activity.create.scale')}}</label>
                <div class="col-sm-9">
                  <select class="form-control select2" name="scale_id" required="">
                    @foreach ($scales as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12">
                  <label for="">
                    <strong>FEI:</strong> Funciones ejecutivas iniciales<br>
                    <strong>EC:</strong> Esquema Corporal<br>
                    <strong>NI:</strong> Niveles de imitación<br>
                  </label>
                </div>
                <label for="inputCategory" class="col-sm-3 col-form-label">{{trans('t.activity.create.categories')}}</label>
                <div class="col-sm-9">
                  <select class="form-control select2" multiple="" name="categories[]" required="">
                    @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTotalTime" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                  <input type="hidden" min="0" name="total_time" class="form-control" required="" autocomplete="off" value="0">
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
<script src="/vendor/intwo/preview.js"></script>
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
      // ['table', ['table']],
      // ['insert', ['link', 'picture', 'video']],
      // ['view', ['codeview', 'help']]
    ],
    disableDragAndDrop: true,
    styleTags: [
    'p',
    { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
	  ],
    // airMode: true
  });
</script>

{{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script> --}}
@endpush

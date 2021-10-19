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
    <h1>{{trans('t.activity.edit.title')}}</h1>
    {{-- <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div> --}}
    <button type="button" class="ml-2 btn btn-sm btn-danger"
    data-toggle="modal"
    data-target="#deleteModal"
    data-id="{{$activity->id}}">
      Eliminar
    </button>
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
          <form action="{{route('activity.update', $activity->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Formulario de edición</h4>
            </div>
            <div class="card-body">

              <div class="form-group row ">
                <label for="inputCode" class="col-sm-3 col-form-label">{{trans('t.activity.edit.code')}}</label>
                <div class="col-sm-9">
                  <input type="text" value="{{$activity->code}}" class="form-control" readonly autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">{{trans('t.activity.create.name')}}</label>
                <div class="col-sm-9">
                  <input type="text" name="name" value="{{$activity->name}}" class="form-control" required="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-12 col-form-label">{{trans('t.activity.create.objective')}}</label>
                <div class="col-sm-12">
                  <textarea name="objective" class="ckeditor" id="summernote" required>{!! $activity->objective !!}</textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">{{trans('t.activity.create.photo')}}</label>
                <div class="input-group">
                  {{-- <img src="{{route('photo',$activity->photo)}}" class='Responsive image img-thumbnail' required=""  width='200px' height='200px' alt=""> --}}
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div id="preview">
                    <img class="img-fluid" src="{{ $activity->present()->getPhoto() }}" alt="" title=""></a>
                  </div>
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              {{-- <img src="{{ asset('storage/photo_activity/'.$activity->photo) }}" alt="" title=""></a> --}}

              <div class="form-group row">
                <label for="inputScale" class="col-sm-3 col-form-label">{{trans('t.activity.create.scale')}}</label>
                <div class="col-sm-8 row">
                  <select class="form-control select2" name="scale_id" required="">
                    @foreach ($scales as $s)
                      @if ($activity->scale_id == $s->id)
                        <option selected value="{{ $s->id }}">{{ $s->name }}</option>
                      @else
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputCategory" class="col-sm-3 col-form-label">{{trans('t.activity.create.categories')}}</label>
                <div class="col-sm-12 row">
                  <select class="form-control select2" multiple="" name="categories[]" required="">
                    @foreach ($categories as $c)
                      @if ($c->selected)
                        <option selected value="{{ $c->id }}">{{ $c->name }}</option>
                      @else
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputTotalTime" class="col-sm-3 col-form-label">{{trans('t.activity.create.total_time')}}</label>
                <div class="col-sm-9">
                  <input type="number" min="0" name="total_time" value="{{$activity->total_time}}" class="form-control" required="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputScale" class="col-sm-3 col-form-label">Estado</label>
                <div class="col-sm-6">
                  <select class="form-control select2" name="status" required="">
                    @foreach ($activity->present()->states as $key => $value)
                    <option {{ ($key == $activity->status) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="control-label col-sm-3">Evaluación <small class="text-danger">*</small></div>
                <div class="col">
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="evaluation_quiz_enabled" class="custom-switch-input" {{$activity->evaluation_quiz_enabled ? 'checked' : ''}}>
                    <span class="custom-switch-description mr-2">No</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Si</span>
                  </label>
                </div>
              </div>

              <div class="form-group row">
                <div class="control-label col-sm-3">Momento del día <small class="text-danger">*</small></div>
                <div class="col">
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="day_quiz_enabled" class="custom-switch-input" {{$activity->day_quiz_enabled ? 'checked' : ''}}>
                    <span class="custom-switch-description mr-2">No</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Si</span>
                  </label>
                </div>
              </div>

              <div class="form-group row">
                <div class="control-label col-sm-3">Frecuencia <small class="text-danger">*</small></div>
                <div class="col">
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="frequency_quiz_enabled" class="custom-switch-input" {{$activity->frequency_quiz_enabled ? 'checked' : ''}}>
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
@push('outerDiv')
  @include('components.modal._delete')
@endpush
@push('javascript')
<script src="/vendor/intwo/preview.js"></script>
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
      // ['table', ['table']],
      // ['insert', ['link', 'picture', 'video']],
      // ['view', ['codeview', 'help']]
    ],
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
<script>
  $(function () {
    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var id = button.data('id');
      var url = "{{route('activity.delete')}}";
      modal.find('.modal-title').text('¿Desea eliminar la actividad?');
      modal.find('.modal-body input').val(id);
      modal.find('#formDelete').attr('action',url);
    });
  });
</script>
@endpush


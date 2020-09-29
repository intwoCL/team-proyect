@extends('layouts.app')

@push('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{route('content.show',[$i->content->activity->id,$i->content->id])}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Editar item</h1>
    <div class="section-header-breadcrumb">
      {{-- <button class="breadcrumb-item btn btn-info">Información --}}
        {{-- <i class="fa fa-question mr-2 text-danger pull-right"></i> --}}
      {{-- </button> --}}
      
      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#infoModal">
        Información
      </button>
      <button type="button" class="btn btn-sm btn-info ml-2" data-toggle="modal" data-target="#dataModal">
        Data
      </button>
      <a href="{{ route('preview.item',$i->id) }}" class="btn btn-success btn-sm ml-2">Preview</a>
    </div>
    {{-- <br> --}}
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        @include('partials._errors')

        <div class="card">
          <form action="{{route('item.update',$i->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Editar Item</h4>
            </div>
            <div class="card-body row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="inputName">Nombre</label>
                  <div class="col-sm-9">
                      <input id="inputName" type="text" name="name" class="form-control" autocomplete="off" value="{{$i->name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="inputTitulo">Titulo</label>
                  <div class="col-sm-9">
                      <input id="inputTitulo" type="text" name="title" class="form-control" autocomplete="off" value="{{$i->title}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Contenido</label>
                  <div class="col-sm-12">
                      <textarea name="body" class="ckeditor" id="summernote" rows="5" autocomplete="off">{{$i->body}}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="inputType">Tipo</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" name="type" required="">
                      @foreach ($types as $key => $value)
                      <option {{ ($i->type==$key) ? 'selected' : ''}} value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div id="url" class="form-group">
                  <label>Vinculo URL adjunto</label>
                  <input type="text" name="url" class="form-control" placeholder="Link de sitio" autocomplete="off" value="{{ ($i->type==1) ? $i->data : '' }}">
                </div>

                <div id="video" class="form-group">
                  <label>Video adjunto <small>(ejemplo: https://www.youtube.com/watch?v=<strong>kJQP7kiw5Fk</strong>)</small></label>
                  <input type="text" name="video" class="form-control"  placeholder="" autocomplete="off" value="{{ ($i->type==2) ? $i->data : '' }}">
                </div>

                <div id="imagen" class="form-group">
                  <label>Foto adjunta</label>
                  <input class="form-control" type="file" name="photo" accept="image/*" onchange="preview(this)"/>
                  <div id="preview">
                      <img class="img-fluid" src="{{ ($i->type==3) ? $i->present()->getPhoto() : '' }}" alt="" title="">
                  </div>
                </div>

                <div id="audio">
                  <div class="form-group">
                  
                    <label>Audio adjunto</label>
                    <input type="file" name="audio"  accept="mp3/*" class="form-control">
                  </div>

                  <div class="text-center">
                    <div class="mp3-audio">
                      <audio controls class="mp3-auido">
                        <source src="{{ ($i->type==4) ? $i->present()->getAudio() : '' }}">
                        Your browser does not support the audio element.
                      </audio>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Imagen (opcional)</label>
                    <input class="form-control" type="file" name="image" accept="image/*" onchange="preview2(this)"/>

                    <div class="form-group center-text">
                      <div id="preview2"></div>
                    </div>
                    <div class="form-group center-text">
                      <img class="img-fluid" src="{{ ($i->type==4) ? $i->present()->getPhoto() : '' }}" alt="" title="">
                    </div>
                  </div>
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
  @include('admin.activity.content.item._modal_info')
  @include('admin.activity.content.item._modal_data')
@endpush
@push('javascript')
<script src="/vendor/intwo/preview.js"></script>
<script src="/vendor/intwo/preview2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    var typeFormIds = [
      'url',
      'video',
      'imagen',
      'audio'
    ];

    function cambiarInput(formIds, optId){
      typeFormIds.forEach((tipo) => {
        document.getElementById(tipo).style.display='none';
      }); // Desaparecen todos
      if(optId<5){
        var inputActivate = document.getElementById(formIds[optId-1]);
        inputActivate.style.display=""; // Aparece
      }
    }

    $(".select2").on('change',(e) => {
        var tipoOptId = e.target.value;
        cambiarInput(typeFormIds,tipoOptId);
    });

    cambiarInput(typeFormIds,'{{$i->type}}');
</script>
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

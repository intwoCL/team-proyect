@extends('layouts.app')

@push('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{route('content.show',[$i->itemContent->activity->id,$i->itemContent->id])}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Editar item</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Item</a></div>
      <div class="breadcrumb-item">Editar Item</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Editar Item</h2>
    {{-- <p class="section-lead">
      Form validation using default from Bootstrap 4
    </p> --}}

    <div class="row">

      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._errors')

        <div class="card">
          <form action="{{route('item.update',[$i->itemContent->activity->id,$i->itemContent->id,$i->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$i->id}}">
            <div class="card-header">
              <h4>Editar Item</h4>
            </div>
            <div class="card-body">

              <input type="hidden" name="id" value={{$i->id}}>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="inputTitulo">Titulo</label>
                <div class="col-sm-9">
                    <input id="inputTitulo" type="text" name="title" class="form-control" required="" autocomplete="off" value="{{$i->title}}">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="inputType">Tipo</label>
                <div class="col-sm-9">
                  <select class="form-control select2" name="type" required="">
                    @foreach ($types as $t)
                    <option {{$t->select}} value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div id="texto" class="form-group">
                <label>Contenido</label>
                <div class="col-sm-12">
                    <textarea name="content" class="ckeditor" id="summernote" rows="5" autocomplete="off">{{$i->text}}</textarea>
                </div>
              </div>

              {{-- adjuntos (desaparecen con jquery) --}}

              <div id="url" class="form-group">
                <label>Vinculo URL adjunto</label>
                <input type="text" name="url" class="form-control" placeholder="Link de sitio" autocomplete="off" value="{{$i->url}}">
              </div>

              <div id="video" class="form-group">
                <label>Video adjunto</label>
                <input type="text" name="video" class="form-control"  placeholder="Url de video" autocomplete="off" value="{{$i->video}}">
              </div>

              <div id="photo" class="form-group">
                <label>Foto adjunta</label>
                <input class="form-control" type="file" name="photo" accept="image/*" onchange="preview(this)"/>
                <div id="preview">
                    <img class="img-fluid" src="{{ $i->getPhoto() }}" alt="" title="">
                </div>
              </div>

              <div id="audio" class="form-group">
                <label>Audio adjunto</label>
                <input type="text" name="audio" class="form-control" autocomplete="off">
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
<script src="/vendor/intwo/preview.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    var typeFormIds = [
        'url',
        'video',
        'photo',
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

    cambiarInput(typeFormIds,'{{$i->type_id}}');
</script>
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

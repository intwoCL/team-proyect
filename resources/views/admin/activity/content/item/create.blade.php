@extends('layouts.app')

@push('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{route('content.show',[$a->id,$c->id])}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Crear item</h1>
  </div>

  <div class="section-body">
    <h2 class="section-title">Crear nuevo Item</h2>
    <p class="section-lead">
      Crear nuevo item para contenido
    </p>

    <div class="row">

      <div class="col-12 col-md-12 col-lg-12">
        @include('partials._errors')

        <div class="card">
          <form action="{{route('item.store',[$a->id,$c->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
              <h4>Nuevo Item</h4>
            </div>
            <div class="card-body row">
              <input type="hidden" name="content_id" value={{$c->id}}>
              <input type="hidden" name="activity_id" value={{$a->id}}>
              <div class="col">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="inputTitulo">Titulo</label>
                  <div class="col-sm-9">
                      <input id="inputTitulo" type="text" name="title" class="form-control" required="" autocomplete="off" value="{{ old('name')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Contenido</label>
                  <textarea style="height:auto;" name="content" class="form-control ckeditor" id="summernote" rows="5" autocomplete="off"></textarea>
                </div>

              </div>
              <div class="col">
  
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="inputType">Tipo</label>
                  <div class="col-sm-9">
                    <select id="selectType" class="form-control select2" name="type" required="">
                      @foreach ($types as $t)
                      <option value="{{ $t->id }}">{{ ucfirst($t->name) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                {{-- adjuntos (desaparecen con jquery) --}}

                <div id="url" class="form-group">
                  <label>Vinculo URL adjunto</label>
                  <input type="text" name="url" class="form-control" placeholder="Link de sitio" autocomplete="off">
                </div>

                <div id="video" class="form-group">
                  <label>Video adjunto</label>
                  <input type="text" name="video" class="form-control"  placeholder="Url de video" autocomplete="off">
                </div>

                <div id="photo" class="form-group">
                  <label>Foto adjunta</label>
                  <input class="form-control" type="file" name="photo" accept="image/*" onchange="preview(this)"/>
                  <div id="preview"></div>
                </div>

                <div id="audio" class="form-group">
                  <label>Audio adjunto</label>
                  <input type="file" name="audio" class="form-control" onchange="return validarExtensionArchivo()">
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

<section class="">
  <div class="section-body">
    <div class="tex-center">
      <div class="card">
        <div class="card-header">
          <h4>Default Validation</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <img src="https://www.iebschool.com/blog/wp-content/uploads/2016/02/Taco_Party_4.gif" width="250px" alt="">
          </div>

          <div class="form-group">
            <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </h4>
          </div>

          <div class="form-group">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident voluptate consectetur inventore eligendi placeat iusto ullam dolores beatae optio qui! Odit tempore ducimus, similique fugit esse dicta repellat eos voluptas.</p>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">{{ trans('button.save') }}</button>
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

    cambiarInput(typeFormIds,5);
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

  <script>
    function validarExtensionArchivo(){
      var fileInput = document.getElementById('file');
      var filePath = fileInput.value;
      var allowedExtensions = /(\.wav|\.mp3|\.mp4|\.mid)$/i;
      if(!allowedExtensions.exec(filePath)){
          alert('Solo se permite archivos de audio con esta extensión .wav/.mp3/.mp4/.mid .');
          fileInput.value = '';
          return false;
      }else{
          //Otro Código
      }
    }
  </script>
@endpush

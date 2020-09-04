@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{route('content.show',[$a->id,$c->id])}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Crear item</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Crear nuevo Item</h2>
    <p class="section-lead">
      Crear nuevo item para contenido
    </p>

    <div class="row">

      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._errors')

        <div class="card">
          <form action="{{route('item.store',[$a->id,$c->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
              <h4>Nuevo Item</h4>
            </div>
            <div class="card-body">
              <input type="hidden" name="content_id" value={{$c->id}}>
              <input type="hidden" name="activity_id" value={{$a->id}}>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="inputTitulo">Titulo</label>
                <div class="col-sm-9">
                    <input id="inputTitulo" type="text" name="title" class="form-control" required="" autocomplete="off" value="{{ old('name')}}">
                </div>
              </div>

              <div class="form-group">
                <label>Contenido</label>
                <input type="text" name="content" class="form-control" required="" autocomplete="off">
              </div>

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
                <input type="text" name="audio" class="form-control" autocomplete="off">
              </div>

              <div id="texto" class="form-group">
                <label>Texto adjunto</label>
                <textarea style="height:auto;" name="texto" class="form-control" rows="5" autocomplete="off"></textarea>
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
<script>
    var typeFormIds = [
        'url',
        'video',
        'photo',
        'audio',
        'texto'
    ];

    function cambiarInput(formIds, optId){
        typeFormIds.forEach((tipo) => {
          document.getElementById(tipo).style.display='none';
        }); // Desaparecen todos
        var inputActivate = document.getElementById(formIds[optId-1]);
        inputActivate.style.display=""; // Aparece
    }

    $(".select2").on('change',(e) => {
        var tipoOptId = e.target.value;
        cambiarInput(typeFormIds,tipoOptId);
    });

    cambiarInput(typeFormIds,1);
</script>
@endpush

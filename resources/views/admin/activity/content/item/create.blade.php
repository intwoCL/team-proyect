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
          <form action="{{route('item.store',[$a->id,$c->id])}}" method="POST" >
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

              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="inputType">Tipo</label>
                <div class="col-sm-9">
                  <select id="selectType" class="form-control select2" name="type" required="">
                    @foreach ($types as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div id="contenido" class="form-group">
                <label>Contenido</label>
                <input type="text" name="url" class="form-control" required="" autocomplete="off">
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
    var tipoForm = {
        1: '<label>URL</label>\n<input type="text" name="content" class="form-control" required="" placeholder="Link de sitio" autocomplete="off">',
        2: '<label>Video</label>\n<input type="text" name="content" class="form-control" required="" placeholder="Url de video" autocomplete="off">',
        3: '<label>Foto</label><input type="file" name="photo" accept="image/*" onchange="preview(this)"/> <div id="preview"></div>',
        4: '<label>Audio</label>\n<input type="text" name="content" class="form-control" required="" autocomplete="off">',
        5: '<label>Texto</label>\n<textarea name="content" class="form-control" rows="5" required="" autocomplete="off"></textarea>'
    };

    $(".select2").on('change',(e) => {
        var idOpt = e.target.value;
        var contenido = document.getElementById("contenido");
        contenido.innerHTML = tipoForm[idOpt];
    });

</script>
@endpush

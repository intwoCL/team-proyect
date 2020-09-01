@extends('layouts.app')

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
          <form action="{{route('item.update',[$i->itemContent->activity->id,$i->itemContent->id,$i->id])}}" method="POST" >
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

              <div class="form-group">
                <label>Contenido</label>
                <textarea name="content" class="form-control" cols="30" rows="10" required="" autocomplete="off">{{$i->content}}</textarea>
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

@endpush

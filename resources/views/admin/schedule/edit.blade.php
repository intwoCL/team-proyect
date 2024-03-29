@extends('layouts.app')

@section('content')

<section class="section">
  <div class="section-header">
    <a href="{{ route('schedule.index',$sch->user_id)}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Actualizar / {{ $sch->name }}</h1>
  </div>
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._errors')
        <div class="card">
          <form action="{{route('schedule.update',$sch->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Edición de Calendario</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" required="" autocomplete="off" value="{{ $sch->name }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputObjective" class="col-sm-3 col-form-label">Objetivo</label>
                <div class="col-sm-9">
                  <input type="text" name="objective" class="form-control" required="" autocomplete="off" value="{{ $sch->objective }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputScale" class="col-sm-3 col-form-label">Estado</label>
                <div class="col-sm-9">
                  <select class="form-control select2" name="status" required="">
                    @foreach ($sch->present()->states as $key => $value)
                    <option {{ ($key == $sch->status) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputObjective" class="col-sm-12 col-form-label">Comentario <small>(este comentario lo verá en la App)</small></label>
                <div class="col-sm-12">
                  <textarea class="form-control" style="height: auto" id="comment" rows="3" name="comment" autocomplete="off">{{ $sch->comment }}</textarea>
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

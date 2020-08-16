@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{ route('activity.index') }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>{{trans('t.activity.show.title')}} </h1>
      <div class="section-header-button">
        {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
        <button onClick="window.location.href='{{ route('content.create',$a->id) }}'" class="btn btn-primary">Nuevos Contenidos</button>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Lista de todos los contenidos</h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-md ">
              <thead>
              <tr>
                <th>#</th>
                <th>Id Actividad</th>
                <th>Nombre</th>
                <th>Objetivo</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach ($a->contents as $c)
              <tr>
                <td>{{$c->position}}</td>
                <td>{{$c->activity_id}}</td>
                <td>{{$c->name}}</td>
                <td></td>
                <td> <a href="{{route('content.show',[$a->id,$c->id])}}" class="btn btn-primary">Items</a> </td> 
                <td> <a href="{{route('content.edit',[$a->id,$c->id])}}" class="btn btn-primary">Editar</a> </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

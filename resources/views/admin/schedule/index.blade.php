@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{route('enrollment.index')}}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Horarios Asignados</h1>
      <div class="section-header-button">
        <a href="{{route('schedule.create',$id)}}" class="btn btn-primary btn-sm">Asignar calendario</a>
      </div>
    </div>
    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-md ">
              <thead>
                <tr>
                  <th>Numero</th>
                  <th>Nombre</th>
                  <th>Objectivo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($schedules as $sch)
              <tr>
                <td>{{ $sch->id}}</td>
                <td>{{ $sch->name}}</td>
                <td>{{ $sch->objective}}</td>
                <td>
                  <a href="{{ route('schedule.show',$sch->id) }}" class="btn btn-sm btn-info">Ver</a>
                  <a href="{{ route('schedule.edit',$sch->id) }}" class="btn btn-sm btn-primary">editar</a>
                </td>
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

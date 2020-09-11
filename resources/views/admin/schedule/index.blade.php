@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Panel de calendarios</h1>
      <div class="section-header-button">
        <a href="{{ route('calendar.create') }}" class="btn btn-primary btn-sm">Asignar calendario</a>
      </div>
    </div>
    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-md ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Objectivo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($schedules as $ca)
              <tr>
                <td>{{ $ca->calendar->id}}</td>
                <td>{{ $ca->calendar->name }}</td>
                <td>{{ $ca->calendar->objective }}</td>
                <td>
                  <a href="{{ route('calendar.edit',$ca->id) }}" class="btn btn-sm btn-primary">editar</a>
                  <a href="{{ route('calendar.show',$ca->id) }}" class="btn btn-sm btn-info">Ver</a>
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

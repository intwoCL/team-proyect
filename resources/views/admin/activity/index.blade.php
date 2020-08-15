@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Panel de actividades</h1>
      <div class="section-header-button">
        {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
        <button onClick="window.location.href='{{ route('activity.create') }}'" class="btn btn-primary">Crear nueva actividad</button>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Lista de todas las actividades </h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      @include('partials._alert')
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-md ">
              <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Description</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach ($activities as $a)
              <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->objective}}</td>
                <td><button onClick="window.location.href='{{ route('activity.show',$a->id) }}'" class="btn btn-primary">Contenidos</button></td>
                <td><button onClick="window.location.href='{{ route('activity.edit',$a->id) }}'" class="btn btn-primary">Editar</button></td>
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

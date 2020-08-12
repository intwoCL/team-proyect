@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Panel de actividades</h1>
      <div class="section-header-button">
        {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
        <button onClick="window.location.href='{{ route('user.create') }}'" class="btn btn-primary">Crear nueva actividad</button>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Lista de todas las actividades </h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-md ">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Level</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach ($users as $u)
              <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->first_name }}</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing.</td>
                <td>3</td>
                <td><button onclick="window.location.href='{{ route('user.show',$u->id) }}'"></button></td>
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

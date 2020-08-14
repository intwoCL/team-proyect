@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Panel de calendarios</h1>
      <div class="section-header-button">
        {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
        <button onClick="window.location.href='{{ route('calendar.create') }}'" class="btn btn-primary btn-sm">Crear nuevo calendario de actividades</button>
      </div>
    </div>
    <div class="section-body">
      {{-- <h2 class="section-title">Lista de todas las actividades </h2> --}}
      {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}
      @include('partials.alert')
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
              @foreach ($calendars as $ca)
              <tr>
                <td>{{ $ca->id }}</td>
                <td><button onClick="window.location.href='{{ route('calendar.show',$ca->id) }}'"></button></td>
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

@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Panel de calendarios</h1>
      <div class="section-header-button">
        <a href="{{ route('calendar.create') }}" class="btn btn-primary btn-sm">Crear calendario</a>
      </div>
    </div>
    <div class="section-body">
      {{-- <h2 class="section-title">Lista de todas las actividades </h2> --}}
      {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-md ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ trans('t.user.calendar.name') }}</th>
                  <th>{{ trans('t.activity.content.objective') }}</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($calendars as $ca)
              <tr>
                <td>{{ $ca->id }}</td>
                <td>{{ $ca->name }}</td>
                <td>{{ $ca->objective }}</td>
                <td><a href="{{ route('calendar.show',$ca->id) }}" class="btn btn-sm btn-info">{{ trans('t.see') }}</a></td>
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

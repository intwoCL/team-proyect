@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{ route('calendar.index') }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Panel de calendarios - {{ $c->name }}</h1>
      <div class="section-header-button">
        <a href="{{ route('calendar.activity.edit',$c->id) }}" class="btn btn-primary btn-sm">Editar</a>
        <a href="" class="btn btn-success btn-sm">Preview</a>
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
                  <th>Lunes</th>
                  <th>Martes</th>
                  <th>Miercoles</th>
                  <th>Jueves</th>
                  <th>Viernes</th>
                  <th>Sábado</th>
                  <th>Domingo</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td>Juego a la pelota</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('javascript')

@endpush
@extends('layouts.app')
@push('stylesheet')
<style>
  table {
  border-collapse: collapse !important;
}

table, th, td {
  border: 1px solid #a09d9d !important;
}
</style>
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{ url()->previous() }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Panel de calendarios - {{ $sch->name }}</h1>
      <div class="section-header-button">
        <a href="{{ route('schedule.details.edit',$sch->id) }}" class="btn btn-primary btn-sm">Editar</a>
      </div>
    </div>
    <div class="section-body">
      {{-- <h2 class="section-title">Lista de todas las actividades </h2> --}}
      {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">Lunes</th>
                  <th scope="col">Martes</th>
                  <th scope="col">Miercoles</th>
                  <th scope="col">Jueves</th>
                  <th scope="col">Viernes</th>
                  <th scope="col">Sábado</th>
                  <th scope="col">Domingo</th>
                </tr>
              </thead>
              <tbody>
              @for ($i = 0; $i < $max; $i++)
                <tr>
                @for ($j = 0; $j < 7; $j++)
                  <td>{!! !empty($sch_activities[$j][$i]) ? $sch_activities[$j][$i]->getCodeNameTimeHTML() : '' !!}</td>
                @endfor
                </tr>
              @endfor
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

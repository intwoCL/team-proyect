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
      <a href="{{ route('schedule.index',$sch->user_id) }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Reportes Semanales - {{ $sch->name }}</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">EVALUACIÓN</h2>

      {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}
      <div class="card">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('schedule.report',$sch->id) }}" method="post">
              @csrf
              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">Seleccionar semana</label>
                <div class="col-sm-9">
                  <input type="week" name="times" min="1" class="form-control" required="" value="">
                </div>
              </div>
              <button class="btn btn-success">Enviar</button>
            </form>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col"></th>
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
              @for ($i = 0; $i < 3; $i++)
                <tr>
                @for ($j = 0; $j < 8; $j++)
                  <td>
                    @if (0 == $j)
                      <i class="fa fa-smile fa-4x text-success"></i>
                    @endif
                  </td>
                  {{-- <td class="text-center">{!! !empty($sch_activities[$j][$i]) ? "<span class=''>{$sch_activities[$j][$i]->getCodeNameTimeHTML()}</span>" : '' !!}</td> --}}
                @endfor
                </tr>
              @endfor
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col"></th>
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
              @for ($i = 0; $i < 3; $i++)
                <tr>
                @for ($j = 0; $j < 8; $j++)
                  <td>
                    @if (0 == $j)
                      <i class="fa fa-smile fa-4x text-success"></i>
                    @endif
                  </td>
                  {{-- <td class="text-center">{!! !empty($sch_activities[$j][$i]) ? "<span class=''>{$sch_activities[$j][$i]->getCodeNameTimeHTML()}</span>" : '' !!}</td> --}}
                @endfor
                </tr>
              @endfor
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col"></th>
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
              @for ($i = 0; $i < 3; $i++)
                <tr>
                @for ($j = 0; $j < 8; $j++)
                  <td>
                    @if (0 == $j)
                      <i class="fa fa-smile fa-4x text-success"></i>
                    @endif
                  </td>
                  {{-- <td class="text-center">{!! !empty($sch_activities[$j][$i]) ? "<span class=''>{$sch_activities[$j][$i]->getCodeNameTimeHTML()}</span>" : '' !!}</td> --}}
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

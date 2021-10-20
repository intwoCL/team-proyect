@extends('layouts.app')
@push('stylesheet')
<style>
  table {
  border-collapse: collapse !important;
}

table, th, td {
  border: 1px solid #a09d9d !important;
}

i {
  vertical-align: middle;
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
      <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">
        INFORMACIÓN
      </button>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('schedule.reports',$sch->id) }}" method="post">
              @csrf
              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">Seleccionar semana</label>
                <div class="col-sm-9">
                  <input type="date" name="fecha" class="form-control" value="{{ $date }}">
                </div>
              </div>
              <button class="btn btn-success">Enviar</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="card">
          <div class="card-body text-center">
            <h5 class="card-title">Promedio de la semana</h5>
              @if ($resumen['count'] > 0)
              <div class="mb-2">
                @include('admin.schedule.details._p_evaluation')
              </div>
              <div class="mb-2">
                @include('admin.schedule.details._p_day')
              </div>
              <div class="">
                @include('admin.schedule.details._p_frecuency')
              </div>
              @else
                <h6>No hay información</h6>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        {{-- <h5 class="card-title">Title</h5> --}}
        {{-- <p class="card-text">Content</p> --}}
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">General</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
              <i class="fa fa-lg fa-book-open text-success" ´
                title="Evaluación"></i>
              Evaluacion
            </a>
            <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
              <i class="fa fa-lg fa-sun text-success"
                title="Momento del día"></i>
              Horario
            </a>
            <a class="nav-link" id="nav-frecuencia-tab" data-toggle="tab" href="#nav-frecuencia" role="tab" aria-controls="nav-frecuencia" aria-selected="false">
              <i class="fa fa-lg fa-stopwatch-20 text-success" title="Frecuencia"></i>
              Frecuencia
            </a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <div class="col-md-12">
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
                        <td class="text-center">
                          @php
                            $data = null;
                            $report = null;
                            if (!empty($sch_activities[$j][$i])) {
                              $data = $sch_activities[$j][$i];
                              $report = $data['reporte'];
                            }
                          @endphp
                          @if ($data)
                          <small>
                            <strong>
                              {{ $sch_activities[$j][$i]->activity->id . ' ' . $sch_activities[$j][$i]->activity->name }}
                            </strong>
                          </small>
                          @endif
                          @if ($report)
                            <div class="mb-3">
                              @include('admin.schedule.details._evaluation')
                              @include('admin.schedule.details._day')
                              @include('admin.schedule.details._frecuency')
                            </div>
                          @endif
                        </td>
                      @endfor
                      </tr>
                    @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
              <div class="col-md-12">
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
                        <td class="text-center">
                          @php
                            $data = null;
                            $report = null;
                            if (!empty($sch_activities[$j][$i])) {
                              $data = $sch_activities[$j][$i];
                              $report = $data['reporte'];
                            }
                          @endphp
                          @if ($data)
                          <small>
                            <strong>
                              {{ $sch_activities[$j][$i]->activity->id . ' ' . $sch_activities[$j][$i]->activity->name }}
                            </strong>
                          </small>
                          @endif
                          @if ($report)
                          <div class="mb-3">
                            @include('admin.schedule.details._evaluation')
                          </div>
                          @endif
                        </td>
                      @endfor
                      </tr>
                    @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="row">
              <div class="col-md-12">
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
                        <td class="text-center">
                          @php
                            $data = null;
                            $report = null;
                            if (!empty($sch_activities[$j][$i])) {
                              $data = $sch_activities[$j][$i];
                              $report = $data['reporte'];
                            }
                          @endphp
                          @if ($data)
                          <small>
                            <strong>
                              {{ $sch_activities[$j][$i]->activity->id . ' ' . $sch_activities[$j][$i]->activity->name }}
                            </strong>
                          </small>
                          @endif
                          @if ($report)
                          <div class="mb-3">
                            @include('admin.schedule.details._day')
                          </div>
                          @endif
                        </td>
                      @endfor
                      </tr>
                    @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-frecuencia" role="tabpanel" aria-labelledby="nav-frecuencia-tab">
            <div class="row">
              <div class="col-md-12">
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
                        <td class="text-center">
                          @php
                            $data = null;
                            $report = null;
                            if (!empty($sch_activities[$j][$i])) {
                              $data = $sch_activities[$j][$i];
                              $report = $data['reporte'];
                            }
                          @endphp
                          @if ($data)
                          <small>
                            <strong>
                              {{ $sch_activities[$j][$i]->activity->id . ' ' . $sch_activities[$j][$i]->activity->name }}
                            </strong>
                          </small>
                          @endif
                          @if ($report)
                          <div class="mb-3">
                            @include('admin.schedule.details._frecuency')
                          </div>
                          @endif
                        </td>
                      @endfor
                      </tr>
                    @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">INFORMACIÓN DEL REPORTE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-sm-12 COL-md-12 col-xs-12 text-center">
            <div class="btn-group mb-3 mt-2" role="group" aria-label="face group">
              <div class="mr-3">
                <img src="/images/quiz/cara0.png" width="50px" alt="">
                <p>EXCELENTE</p>
              </div>
              <div class="mr-3">
                <img src="/images/quiz/cara1.png" width="50px" alt="">
                <p>BIEN</p>
              </div>
              <div class="mr-3">
                <img src="/images/quiz/cara2.png" width="50px" alt="">
                <p>NORMAL</p>
              </div>
            </div>
          </div>

          <div class="col-sm-12 COL-md-12 col-xs-12 text-center">
            <div class="btn-group mb-3 mt-2" role="group" aria-label="face group">
              <div class="mr-3">
                <img src="/images/quiz/manana.png" width="50px" alt="">
                <p>AMANECER</p>
              </div>
              <div class="mr-3">
                <img src="/images/quiz/dia.png" width="50px" alt="">
                <p>TARDE</p>
              </div>
              <div class="mr-3">
                <img src="/images/quiz/tarde.png" width="50px" alt="">
                <p>ATARDECER</p>
              </div>
              <div class="mr-3">
              <img src="/images/quiz/noche.png" width="50px" alt="">
                <p>NOCHE</p>
              </div>
            </div>
          </div>

          <div class="col-sm-12 COL-md-12 col-xs-12 text-center">
            <div class="btn-group mb-3 mt-2" role="group" aria-label="face group">
              <div class="mr-3">
                <i class="fa fa-square fa-4x text-primary"></i>
                <p>[1-10]</p>
              </div>
              <div class="mr-3">
                <i class="fa fa-square fa-4x text-warning"></i>
                <p>[11-20]</p>
              </div>
              <div class="mr-3">
                <i class="fa fa-square fa-4x text-success"></i>
                <p>[21-30]</p>
              </div>
              <div class="mr-3">
                <i class="fa fa-square fa-4x text-danger"></i>
                <p>[31-40]</p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('javascript')

@endpush

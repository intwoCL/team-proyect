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
        <div class="section-body">
          <div class="container">
            <div class="col-sm-12 COL-md-12 col-xs-12 text-center">
              <div class="btn-group mb-3 mt-2" role="group" aria-label="face group">
                <div class="mr-3">
                  <img src="/images/quiz/dia.png" width="50px" alt="">
                  {{-- <i class="fa fa-square fa-4x text-primary face" role="button" onclick="sendingSurveys(1)"></i> --}}
                  <p>Sin instigación</p>
                </div>
                <div class="mr-3">
                  <img src="/images/quiz/manana.png" width="50px" alt="">
                  {{-- <i class="fa fa-square fa-4x text-primary face" role="button" onclick="sendingSurveys(1)"></i> --}}
                  <p>Sin instigación</p>
                </div>
                <div class="mr-3">
                  <img src="/images/quiz/tarde.png" width="50px" alt="">
                  {{-- <i class="fa fa-square fa-4x text-primary face" role="button" onclick="sendingSurveys(1)"></i> --}}
                  <p>Sin instigación</p>
                </div>
                <div class="mr-3">
                <img src="/images/quiz/noche.png" width="50px" alt="">
                  {{-- <i class="fa fa-square fa-4x text-primary face" role="button" onclick="sendingSurveys(1)"></i> --}}
                  <p>Sin instigación</p>
                </div>
              </div>
            </div>
            <div class="col-md-12">


              <div class="col-md-12 text-center mb-3">
                <div>
                  <span>asdasd</span>
                </div>

              </div>
            </div>
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
                              @if ($report)
                                @include('admin.schedule.details._evaluation')
                                @include('admin.schedule.details._day')
                                @include('admin.schedule.details._frecuency')
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

                              @if ($report)
                                @include('admin.schedule.details._evaluation')
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

                              @if ($report)
                                @include('admin.schedule.details._day')
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
                              @if ($report)
                                @include('admin.schedule.details._frecuency')
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
                      <td class="text-center">
                        @php
                          $data = null;
                          $report = null;
                          if (!empty($sch_activities[$j][$i])) {
                            $data = $sch_activities[$j][$i];
                            $report = $data['reporte'];
                          }
                        @endphp
                        {{-- @json($data) --}}
                 {{--frequency_score --}}
                        {!! !empty($sch_activities[$j][$i]) ? "<span class=''>{$sch_activities[$j][$i]->getCodeNameTimeHTML()}</span>" : '' !!}
                        {{-- @json($sch_activities[$j][$i]['reporte'] ?? '{}') --}}
                          {{-- @json($report) --}}
                        @if ($report)
                          @include('admin.schedule.details._evaluation')
                          @include('admin.schedule.details._day')
                          @include('admin.schedule.details._frecuency')
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
  </section>
@endsection
@push('javascript')

@endpush

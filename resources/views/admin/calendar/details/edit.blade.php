@php
    $now = new \DateTime();
    $fecha = $now->format('Y-m-d');
@endphp
@extends('layouts.app')
@push('stylesheet')
  <!-- fullCalendar -->
  <link href='/vendor/fullcalendar/main.css' rel='stylesheet' />
  <script src='/vendor/fullcalendar/main.js'></script>    
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{ route('calendar.activity.index',$c->id) }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Panel de calendarios - {{ $c->name }}</h1>
      <div class="section-header-button">
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
                  <th><a href="{{ route('calendar.activity.create',[$c->id,1]) }}">Lunes</a></th>
                  <th><a href="{{ route('calendar.activity.create',[$c->id,2]) }}">Martes</a></th>
                  <th><a href="{{ route('calendar.activity.create',[$c->id,3]) }}">Miercoles</a></th>
                  <th><a href="{{ route('calendar.activity.create',[$c->id,4]) }}">Jueves</a></th>
                  <th><a href="{{ route('calendar.activity.create',[$c->id,5]) }}">Viernes</a></th>
                  <th><a href="{{ route('calendar.activity.create',[$c->id,6]) }}">Sábado</a></th>
                  <th><a href="{{ route('calendar.activity.create',[$c->id,7]) }}">Domingo</a></th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
              </tr>
              <tr>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
              </tr>
              <tr>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
              </tr>
              <tr>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
                <td>Juego a la pelota
                  <div class="table-links">
                    <a href="#">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>

                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Lista de todas las actividades </h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      <div class="col-sm-12">
        <div class="col-sm-2">
          <div class="card">
            <div class="card-header">
              <h5>Lunes</h5>
            </div>
            <div class="card-body">
             
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="card">
            <div class="card-header">
              <h5>Lunes</h5>
            </div>
            <div class="card-body">
             
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="card">
            <div class="card-header">
              <h5>Lunes</h5>
            </div>
            <div class="card-body">
             
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </section>
  
  <section class="section">
    <div class="section-header">
      <h1>{{ trans('t.user.calendar.panel_calendar') }}</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-body">

              <div id='calendar'></div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('javascript')  
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script> 
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        // left: 'prev,next today',
        center: 'title',
        right: 'timeGridWeek'
      },
      initialView: 'timeGridWeek',
      initialDate: "{{ $fecha }}",
      locale: 'es',
      minTime: 7,
      maxTime: 20,
      selectable: true,
      businessHours: false,
      eventLimit: false,
      dayMaxEvents: false,
      editable: false,
      weekNumberCalculation: 'ISO',
      defaultView: 'agendaWeek',
            selectHelper: true,
            allDaySlot: true,
            aspectRatio: 1.75,
      events: [
        {
          title: 'All Day Event',
          start: '2020-09-01',
        },
        {
          title: 'Long Event',
          start: '2020-09-07',
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-06-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-09-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-06-11',
          end: '2020-06-13'
        },
        {
          title: 'Meeting',
          start: '2020-09-04T10:30:00',
          end: '2020-09-05T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-06-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-06-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-06-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-06-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2020-06-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-06-28'
        }
      ],
    });
    calendar.render();
  });
</script>
@endpush

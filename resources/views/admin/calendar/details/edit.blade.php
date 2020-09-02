@php
    $now = new \DateTime();
    $fecha = $now->format('Y-m-d');
@endphp
@extends('layouts.app')
@push('stylesheet')
  <!-- fullCalendar -->
  <link href='/vendor/fullcalendar/main.css' rel='stylesheet' />
  <script src='/vendor/fullcalendar/main.js'></script> 

  <link href='/vendor/timetablejs/dist/styles/timetablejs.css' rel='stylesheet' />
  <link href='/vendor/timetablejs/dist/styles/demo.css' rel='stylesheet' />

@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{ route('calendar.activity.index',$c->id) }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Panel de calendarios - {{ $c->name }} | {{ $c->id }}</h1>
      <div class="section-header-button">
        <a href="" class="btn btn-success btn-sm">Preview</a>
      </div>
    </div>
    {{-- <div class="section-body">
      <h2 class="section-title">Lista de todas las actividades </h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
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
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div> --}}
    <div class="section-body">
      <h2 class="section-title">Lista de todas las actividades </h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      <div class="row">
        @foreach (helper_days() as $key => $value)        
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              <h5><a href="{{ route('calendar.activity.create',[$c->id,$key]) }}">{{ strtoupper($value) }}</a></h5>
            </div>
            <div class="card-body">

            </div>
          </div>
        </div>
        @endforeach


        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              <h5><a href="{{ route('calendar.activity.create',[$c->id,1]) }}">Lunes</a></h5>
            </div>
            <div class="card-body">
              @foreach ($calendars as $ca)
                @if ($ca['daysOfWeek'][0] == 1)
                  <p>  {{$ca['title']}}</p><br>
                @endif
              @endforeach
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

  <section class="section">
    <div class="section-header">
      <h1>{{ trans('t.user.calendar.panel_calendar') }}</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-body">

              <div class="timetable"></div>

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

<script src="/vendor/timetablejs/dist/scripts/timetable.js"></script> 



<script>
  var timetable = new Timetable();

  timetable.setScope(9,3)

  timetable.addLocations(['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']);

  timetable.addEvent('Sightseeing', 'Lunes', new Date(2015,7,17,9,00), new Date(2015,7,17,11,30), { url: '#' });
  timetable.addEvent('Zumba', 'Martes', new Date(2015,7,17,12), new Date(2015,7,17,13), { url: '#' });
  timetable.addEvent('Zumbu', 'Martes', new Date(2015,7,17,13,30), new Date(2015,7,17,15), { url: '#' });
  timetable.addEvent('Lasergaming', 'Jueves', new Date(2015,7,17,17,45), new Date(2015,7,17,19,30), { class: 'vip-only', data: { maxPlayers: 14, gameType: 'Capture the flag' } });
  timetable.addEvent('All-you-can-eat grill', 'Viernes', new Date(2015,7,17,21), new Date(2015,7,18,1,30), { url: '#' });
  timetable.addEvent('Hackathon', 'Domingo', new Date(2015,7,17,11,30), new Date(2015,7,17,20)); // options attribute is not used for this event
  timetable.addEvent('Tokyo Hackathon Livestream', 'Lunes', new Date(2015,7,17,12,30), new Date(2015,7,17,16,15)); // options attribute is not used for this event
  timetable.addEvent('Lunch', 'Lunes', new Date(2015,7,17,9,30), new Date(2015,7,17,11,45), { onClick: function(event) {
    window.alert('You clicked on the ' + event.name + ' event in ' + event.location + '. This is an example of a click handler');
  }});
  timetable.addEvent('Cocktails','Sabado', new Date(2015,7,18,00,00), new Date(2015,7,18,02,00), { class: 'vip-only' });

  var renderer = new Timetable.Renderer(timetable);
  renderer.draw('.timetable');
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','UA-37417680-5');ga('send','pageview');
</script>


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
      // allDaySlot: true,
      // aspectRatio: 1.75,
      events: @JSON($calendars)
    });
    calendar.render();
  });
</script>
@endpush

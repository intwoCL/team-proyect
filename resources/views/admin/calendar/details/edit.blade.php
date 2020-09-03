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
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">

@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{ route('calendar.activity.index',$c->id) }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Panel de calendarios - {{ $c->name }} | {{ $c->id }}</h1>

      <div class="section-header-button">
        <a href="{{route('calendar.activity.create2',$c->id)}}" class="btn btn-success btn-sm">Crear por Semana</a>
      </div>
    </div>

  <section class="section col-md-6">
    <div class="section-header">
      <h1>Listado de especialistas</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="tableSelect" class="table table-hover table-sm">
              <thead>
              <tr>
                <th>#</th>
                <th>Día</th>
                <th>Hora</th>
                <th>Actividad</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach ($calendarsActivities as $ca)
              <tr>
                {{-- <td>{{ $ca->id }}</td> --}}
                <td>{{ $ca->weekday }}</td>
                <td>{{ $ca->getDayWords() }}</td>
                <td>{{ $ca->worktime }}</td>
                <td>{{ $ca->activity->name}}
                    <div class="table-links">
                    {{-- <a href="#">View</a>
                    <div class="bullet"></div>
                    <a href="#">Edit</a> --}}
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">Trash</a>
                  </div>
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-danger" 
                    data-toggle="modal" 
                    data-target="#deleteModal" 
                    data-activity="{{$ca->id}}">
                      Eliminar
                  </button>
                </td>
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
@push('outerDiv')
  @include('components.modal._delete')    
@endpush
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
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var modal = $(this);
    var id = button.data('activity');
    var url = "{{route('calendar.activity.delete')}}";
    modal.find('.modal-title').text('¿Desea Borrar esta Actividad?');
    modal.find('.modal-body input').val(id);
    modal.find('#formDelete').attr('action',url);
  });
</script>
@endpush


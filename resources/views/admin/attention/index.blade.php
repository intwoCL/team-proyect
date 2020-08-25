@extends('layouts.app')
@push('stylesheet')
<!-- fullCalendar -->
<link href='/vendor/fullcalendar/main.css' rel='stylesheet' />
<script src='/vendor/fullcalendar/main.js'></script>
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>{{ trans('t.user.calendar.panel_calendar') }}</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-2 col-md-2 col-lg-2">
          @include('partials._errors')
          <div class="card">
            {{-- <form action="{{route('calendar.store')}}" method="POST" enctype="multipart/form-data" > --}}
              {{-- @csrf --}}
              {{-- <div class="card-header">
                <h4></h4>
              </div> --}}
              <div class="card-body">
                <div class="form-group">
                  <a href="{{ route('attention.assigned') }}">{{ trans('t.user.calendar.agenda') }}</a>
                  <a href="">{{ trans('t.user.calendar.historial') }}</a><br>
                  <a href="">Nueva solcitud</a>
                </div>
                {{-- <div class="form-group row">
                  <label for="inputObjective" class="col-sm-12 col-form-label">Objetivo</label>
                </div> --}}
              </div>
              {{-- <div class="card-footer text-right">
              </div> --}}
            {{-- </form> --}}
          </div>
        </div>
        <div class="col-md-10">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: '2020-06-12',
      locale: 'es',
      selectable: true,
      businessHours: true,
      eventLimit: true,
      dayMaxEvents: true,
      editable: false,
      weekNumberCalculation: 'ISO',
      events: [
        {
          title: 'All Day Event',
          start: '2020-06-01'
        },
        {
          title: 'Long Event',
          start: '2020-06-07',
          end: '2020-06-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-06-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-06-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-06-11',
          end: '2020-06-13'
        },
        {
          title: 'Meeting',
          start: '2020-06-12T10:30:00',
          end: '2020-06-12T12:30:00'
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
      ]
    });
    calendar.render();
  });
</script>
@endpush

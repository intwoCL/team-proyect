@php
    $now = new \DateTime();
    $fecha = $now->format('Y-m-d');
@endphp
@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{ route('calendar.show',$c->id) }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Panel de calendarios - {{ $c->name }}</h1>

    <div class="section-header-button">
      <a href="{{route('calendar.activity.create2',$c->id)}}" class="btn btn-success btn-sm">Crear por Semana</a>
    </div>
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
              <th>Code</th>
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
              <td>{{ $ca->activity->id }}</td>
              <td>{{ $ca->activity->name}}</td>
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
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });

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


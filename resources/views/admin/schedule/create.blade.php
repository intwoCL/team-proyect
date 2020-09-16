@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{route('schedule.index',$user->id)}}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Elegir Calendario</h1>
      {{-- <div class="section-header-button">
        <a href="{{ route('calendar.create') }}" class="btn btn-primary btn-sm">Elegir calendario</a>
      </div> --}}
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
                  <th>#</th>
                  <th>Name</th>
                  <th>Objectivo</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($calendars as $ca)
              <tr>
                <td>{{ $ca->id }}</td>
                <td>{{ $ca->name }}</td>
                <td>{{ $ca->objective }}</td>
                <td>
                  <small class="badge badge-{{ $ca->present()->getColor() }}">{{$ca->present()->getState()}}</small>
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-success"
                    data-toggle="modal"
                    data-target="#assignModal"
                    data-calendar="{{$ca->id}}">
                    Asignar
                  </button>

                  {{-- <a href="#" class="btn btn-sm btn-info">Ver</a> --}}
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
  @include('components.modal._assign')
@endpush
@push('javascript')
<script>
  //
  $(function () {

    $('#assignModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var id = button.data('calendar');
      var url = "{{route('schedule.store',$user->id)}}";
      modal.find('.modal-title').text('¿Desea asignar este horario al usuario?');
      modal.find('.modal-body input').val(id);
      modal.find('#formAssign').attr('action',url);
    });
  });
</script>
@endpush

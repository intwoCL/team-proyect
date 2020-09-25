@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
  <div class="col-md-12">
    <section class="section">
      <div class="section-header">
        <h1>Lista de usuarios asignados</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableSelect" class="table table-sm table-hover">
                <thead>
                <tr>
                  {{-- <th>#</th> --}}
                  <th>Nombre</th>
                  <th>Email</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @forelse (current_user()->assignmentUsers as $asigmentUser)
                  <tr>
                    {{-- <td>{{ $u->id }}</td> --}}
                    <td>{{ $asigmentUser->user->present()->getFullName() }}</td>
                    <td>{{ $asigmentUser->user->email }}
                      <div class="table-links">
                        <div class="bullet"></div>
                        <a href="{{ route('enrollment.show',$asigmentUser->id) }}">{{ trans('t.view') }}</a>
                        {{-- <a href="">{{ trans('t.edit') }}</a>
                        <div class="bullet"></div>
                        <a href="" class="text-danger">{{ trans('t.trash') }}</a> --}}
                      </div>
                    </td>
                      {{-- <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success">Asignados</a></td> --}}
                    <td>
                      <a href="{{ route('attention.create', $asigmentUser->user->id) }}" class="btn btn-success btn-sm">Tomar hora</a>
                      <a href="{{ route('attention.historial', $asigmentUser->user->id) }}" class="btn btn-primary btn-sm ml-2">Historial</a>
                      <a href="{{ route('schedule.index',$asigmentUser->user->id)}}" class="btn btn-warning btn-sm ml-2">Horarios</a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="3" class="text-center">No tiene agregado</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('javascript')  
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script> 
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script>
@endpush
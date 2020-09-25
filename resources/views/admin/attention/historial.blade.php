@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
  <div class="col-md-12">
    <section class="section">
      <div class="section-header">
        <a href="{{ route('enrollment.index') }}">
          <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
        </a>
        <h1>Historial</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Usuario : {{ current_user()->present()->getFullName() }}</h2>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableSelect" class="table table-sm table-hover">
                <thead>
                <tr>
                  {{-- <th>#</th> --}}
                  {{-- <th>#</th> --}}
                  {{-- <th>Paciente</th> --}}
                  <th>Especialista</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Comentario de entrada</th>
                  <th>Comentario de salida</th>
                  <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($attentions as $a)
                  <tr>
                    {{-- <td>{{ $u->id }}</td> --}}
                    {{-- <td>{{ $a->user->id }}</td> --}}
                    <td>{{ $a->specialist->present()->getFullName() }}</td>
                    <td>{{ $a->attention_date }}</td>
                    <td>{{ $a->attention_time }}</td>
                    <td>{{ $a->comment_in }}</td>
                    <td>{{ $a->comment_out }}</td>
                    <td>{{ $a->getState()}}</td>

                    {{-- <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success">Asignados</a></td> --}}
                      {{-- <td><a href="{{ route('attention.create', $ass->user->id) }}" class="btn btn-success btn-sm">Tomar hora</a>
                      <a href="{{ route('attention.create', $ass->user->id) }}" class="btn btn-primary btn-sm ml-2">Historial</a></td> --}}
                  </tr>
                  @empty
                  <tr>
                    <td colspan="6" class="text-center">No tiene agregado</td>
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
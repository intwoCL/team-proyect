@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
  <div class="col-md-12">
    <section class="section">
      <div class="section-header">
        <a href="{{ route('assignment.index') }}">
          <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
        </a>
        <h1>Lista de usuarios asignados</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Usuario : {{ current_user()->getFullName() }}</h2>
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
                  @forelse (current_user()->assignmentUsers as $ass)
                  <tr>
                    {{-- <td>{{ $u->id }}</td> --}}
                    <td>{{ $ass->user->getFullName() }}</td>
                    <td>{{ $ass->user->email }}</td>

                    {{-- <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success">Asignados</a></td> --}}
                    <td><a href="{{ route('attention.create', $ass->user->id) }}" class="btn btn-success">Tomar hora</a></td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="1" class="text-center">No tiene agregado</td>
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
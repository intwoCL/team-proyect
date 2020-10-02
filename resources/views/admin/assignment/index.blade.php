@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
  <div class="col-md-12">
    <section class="section">
      <div class="section-header">
        <h1>Listado de especialistas</h1>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableSelect" class="table table-sm table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Numero Asociados</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $u)
                <tr>
                  <td>{{ $u->id }}</td>
                  <td>{{ $u->present()->getFullName() }}
                    {{-- <div class="table-links">
                      <a href="#">View</a>
                      <div class="bullet"></div>
                      <a href="#">Edit</a>
                      <div class="bullet"></div>
                      <a href="#" class="text-danger">Trash</a>
                    </div> --}}
                  </td>
                  <td>{{ count($u->assignmentUsers)}}</td>
                  <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success btn-sm">Asignados</a></td>
                  {{-- <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success">Asignar</a></td> --}}
                </tr>
                @endforeach
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
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
        <div class="section-header-button">
          <a href="{{ route('assignment.edit',$user->id)  }}" class="btn btn-primary btn-sm">Asignar</a>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Usuario : {{ $user->present()->getFullName() }}</h2>
        <p class="section-lead">
          {{ $user->specialty }}
        </p>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableSelect" class="table table-sm table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($user->assignmentUsers as $ass)
                  <tr>
                    <td>{{ $ass->user->present()->getFullName() }}</td>
                    <td>{{ $ass->user->email }}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-danger"
                        data-toggle="modal"
                        data-target="#deleteModal"
                        data-user="{{$ass->user->id}}"
                        data-specialist="{{$user->id}}"
                        data-assignment="{{$ass->id}}">
                          Eliminar
                      </button>
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
@push('outerDiv')
  @include('components.modal._delete')
@endpush
@push('javascript')  
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script> 
<script>
  $(function () {
    $("#tableSelect").DataTable();
    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var id = button.data('user')+"-"+button.data('specialist')+"-"+button.data('assignment');
      var url = "{{route('assignment.delete')}}";
      modal.find('.modal-title').text('¿Desea desvincular al usuario?');
      modal.find('.modal-body input').val(id);
      modal.find('#formDelete').attr('action',url);
    });
  });
</script>
@endpush
@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>{{ trans('t.user.index.title') }}</h1>
      <div class="section-header-button">
        {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
        <button onClick="window.location.href='{{ route('user.create') }}'" class="btn btn-primary btn-sm">{{ trans('t.user.create.title') }}</button>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">{{ trans('t.user.index.list') }}</h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="tableSelect" class="table table-striped table-sm table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>{{ trans('t.user.index.table_run') }}</th>
                <th>{{ trans('t.user.index.table_name') }}</th>
                <th>{{ trans('t.user.index.table_email') }}</th>
                <th>{{ trans('t.user.index.table_languages') }}</th>
                <th class="text-center">{{ trans('t.user.index.table_privileges')}}</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($users as $u)
              <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->run }}</td>
                <td>{{ $u->getFullName() }} 
                  <div class="table-links">
                  <a href="{{ route('user.show',$u->id) }}">{{ trans('t.view') }}</a>
                  <div class="bullet"></div>
                  <a href="{{route('user.edit',$u->id)}}">{{ trans('t.edit') }}</a>
                  <div class="bullet"></div>
                  <a href="{{ route('user.destroy',$u->id) }}" class="text-danger">{{ trans('t.trash') }}</a>
                </div></td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->lang }}</td>
                <td class="text-center">
                  @if ($u->specialist)
                    <i class="fas fa-user-clock text-success mr-2" title="Especialista"></i>
                  @endif
                  @if ($u->admin)
                    <i class="fa fa-user-shield text-primary" title="administrador"></i>
                  @endif
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
@push('javascript')  
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script> 
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script>
@endpush

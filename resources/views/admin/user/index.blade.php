@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Panel de usuarios</h1>
      <div class="section-header-button">
        {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
        <button onClick="window.location.href='{{ route('user.create') }}'" class="btn btn-primary">{{ trans('t.user.create.title') }}</button>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Lista de todos los usuarios</h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      @include('partials.alert')
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-md ">
              <thead>
              <tr>
                <th>#</th>
                <th>{{ trans('t.user.index.table_run') }}</th>
                <th>{{ trans('t.user.index.table_name') }}</th>
                <th>{{ trans('t.user.index.table_email') }}</th>
                <th>{{ trans('t.user.index.table_languages') }}</th>
                <th>{{ trans('t.user.index.table_privileges')}}</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($users as $u)
              <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->run }}</td>
                <td>{{ $u->getFullName() }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->lang }}</td>
                <td>{{ $u->admin . ' .' . $u->specialist }}</td>
                <td><button onclick="window.location.href='{{ route('user.edit',$u->id) }}'" class="btn btn-primary">{{ trans('t.user.edit.edit') }}</button></td>
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

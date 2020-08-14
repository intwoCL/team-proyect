@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <section class="section">
      <div class="section-header">
        <h1>Litado de especialistas</h1>
      </div>
      <div class="section-body">
        @include('partials.alert')
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-md ">
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
                  <td>{{ $u->getFullName() }}</td>
                  <td>{{ count($u->users_allocate)}}</td>
                  <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success">Asignados</a></td>
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
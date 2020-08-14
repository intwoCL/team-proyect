@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <section class="section">
      <div class="section-header">
        <a href="{{ route('assignment.index') }}">
          <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
        </a>
        <h1>Litado de especialistas</h1>
        <div class="section-header-button">
          <a href="{{ route('assignment.edit',$user->id)  }}" class="btn btn-primary btn-sm">Asignar</a>
        </div>
      </div>
      <div class="section-body">
        @include('partials.alert')
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-md ">
                <thead>
                <tr>
                  {{-- <th>#</th> --}}
                  <th>Nombre</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($user->users_allocate as $u)
                <tr>
                  {{-- <td>{{ $u->id }}</td> --}}
                  <td>{{ $u->getFullName() }}</td>
                  {{-- <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success">Asignados</a></td> --}}
                  {{-- <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success">Asignar</a></td> --}}
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

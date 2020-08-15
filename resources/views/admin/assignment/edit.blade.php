@extends('layouts.app')

@section('content')
<div class="col-md-12">
  <section class="section">
    <div class="section-header">
      <a href="{{ route('assignment.show',$user->id) }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Asignar usuarios al especialista</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Usuario : {{ $user->getFullName() }}</h2>
      @include('partials._alertt')
      <form action="{{ route('assignment.store') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}" hidden>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="table" class="table table-md table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($users as $u)
                  <tr>
                    <td>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" name="users[]" value="{{ $u->id }}" type="checkbox" id="">
                        </div>
                      </div>
                    </td>
                    <td>{{ $u->getFullName() }}</td>        
                    <td>{{ $u->email }}</td>        
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2" class="text-center">No hay usuarios</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success float-right">Asignar</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
@endsection
@push('javascript')
  
@endpush

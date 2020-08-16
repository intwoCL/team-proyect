@extends('layouts.app')

@section('content')


<section class="section">
  <div class="section-header">
    <a href="{{ route('user.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>{{trans('t.user.create.title')}}</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div>
  </div>

  <div class="section-body">
    {{-- <h2 class="section-title">Formulario de usuario</h2>
    <p class="section-lead">
      Form validation using default from Bootstrap 4
    </p> --}}
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._errors')
        <div class="card">
          <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Default Validation</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Email<small class="text-danger">*</small></label>
                <input type="email"  name="email" class="form-control" required="" autocomplete="off" value="{{$user->email}}">
              </div>

              <div class="form-group">
                <label>Contraseña<small class="text-danger">* (123456)</small></label>
                <input type="password"  name="password" value="123456" class="form-control" required="" value="{{$user->password}}">
              </div>

              <div class="form-group">
                <label>Rut <small class="text-danger">(opcional)</small></label>
                <input type="text"  name="run" class="form-control" autocomplete="off" value="{{$user->run}}">
              </div>

              <div class="form-group">
                <label>Nombres<small class="text-danger">*</small></label>
                <input type="text"  name="first_name" class="form-control" required="" autocomplete="off" value="{{$user->first_name}}">
              </div>

              <div class="form-group">
                <label>Apellidos<small class="text-danger">*</small></label>
                <input type="text"  name="last_name" class="form-control" required="" autocomplete="off" value="{{$user->last_name}}">
              </div>

              <div class="form-group">
                <label>Foto <small class="text-danger">(opcional)</small></label>
                <input type="file"  name="photo" class="form-control">
              </div>
              {{--Pendiente, obtener información del idioma--}}
              <div class="form-group col-sm-6 col-md-12 col-6">
                <label>Idioma<small class="text-danger">*</small></label>
                <select class="form-control select2" name="lang" required="">
                  <option value="es">Español</option>
                  <option value="en">Inglés</option>
                </select>                
              </div>
              {{--Pendiente--}}
              <div class="form-group">
                <div class="control-label">¿Es administrador? <small class="text-danger">*</small></div>
                <label class="custom-switch mt-2">
                  <input type="checkbox" name="admin" class="custom-switch-input">
                  <span class="custom-switch-description mr-2">No</span>
                  <span class="custom-switch-indicator"></span>
                  <span class="custom-switch-description">Si</span>
                </label>
              </div>
              {{--Pendiente--}}
              <div class="form-group">
                <div class="control-label">¿Es especialista? <small class="text-danger">*</small></div>
                <label class="custom-switch mt-2">
                  <input type="checkbox" name="specialist" class="custom-switch-input">
                  <span class="custom-switch-description mr-2">No</span>
                  <span class="custom-switch-indicator"></span>
                  <span class="custom-switch-description">Si</span>
                </label>
              </div>


            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{ trans('button.update') }}</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</section>
@endsection

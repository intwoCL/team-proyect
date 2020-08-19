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
              <h4>Horizontal Form</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ trans('t.user.profile.email') }}</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="{{ trans('t.user.profile.email') }}" required="" name="email" value="{{$user->email}}">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputRut" class="col-sm-3 col-form-label">{{ trans('t.user.profile.run') }}</label>
                <div class="col-sm-9">
                  <input type="text"  name="run" class="form-control" autocomplete="off" value="{{$user->run}}" required maxlength="9" min="8" autocomplete="off" onkeyup="this.value = validateRun(this.value)" placeholder="{{ trans('t.user.profile.run') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputFirstName" class="col-sm-3 col-form-label">{{ trans('t.user.profile.first_name') }}</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputFirstName" placeholder="{{ trans('t.user.profile.first_name') }}" required="" name="first_name" value="{{$user->first_name}}">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputLastName" class="col-sm-3 col-form-label">{{ trans('t.user.profile.last_name') }}</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputLastName" placeholder="{{ trans('t.user.profile.last_name') }}" required="" name="last_name" value="{{$user->last_name}}">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPhoto" class="col-sm-3 col-form-label">{{ trans('t.user.profile.photo') }}</label>
                <div class="col-sm-9">
                  <input type="file" name="photo" id="inputPhoto" class="form-control">
                </div>
              </div>

              <fieldset class="form-group">
                <label>{{ trans('t.user.profile.lang') }}<small class="text-danger">*</small></label>
                <select class="form-control select2" name="lang" required="" value="{{$user->lang}}">
                  <option value="es">Español</option>
                  <option value="en">Inglés</option>
                </select>  
              </fieldset>

              <fieldset class="form-group">
                <div class="row">
                  <div class="col-form-label col-sm-3 pt-0">¿Es administrador? <small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="admin" class="custom-switch-input" value="{{$user->admin}}">
                    <span class="custom-switch-description mr-2">No</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Si</span>
                  </label>
                </div>
              </fieldset>

              <fieldset class="form-group">
                <div class="row">
                  <div class="col-form-label col-sm-3 pt-0">¿Es especialista? <small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="specialist" class="custom-switch-input" value="{{$user->speciaist}}">
                    <span class="custom-switch-description mr-2">No</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Si</span>
                  </label>
                </div>
              </fieldset>
              
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{ trans('button.update') }}</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <form action="{{route('user.email', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Horizontal Form</h4>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-3 col-form-label">{{ trans('t.user.profile.password') }} * (123456)</label>
              <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="{{ trans('t.user.profile.password') }}" required="" value="123456">
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
@push('javascript')
  <script>
  function validateRun(string) {
    var out = '';
    var filtro = '1234567890Kk';
    for (var i = 0; i < string.length; i++)
      if (filtro.indexOf(string.charAt(i)) != -1)
        out += string.charAt(i).toUpperCase();
    return out;
  }
  </script>
@endpush
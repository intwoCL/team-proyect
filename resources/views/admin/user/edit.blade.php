@extends('layouts.app')
@push('stylesheet')
<style>
  .dropzone {
    background: white;
    border-radius: 5px;
    border: 2px dashed rgb(0, 135, 247);
    border-image: none;
    max-width: 100%;
    /* max-height: 40px; */
    margin-left: auto;
    margin-right: auto;
}
</style>
@endpush
@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{ route('user.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>{{trans('t.user.edit.title')}}</h1>
  </div>

  <div class="section-body">
    {{-- <h2 class="section-title">Formulario de usuario</h2>
    <p class="section-lead">
      Form validation using default from Bootstrap 4
    </p> --}}
    <div class="row">
      <div class="col-md-6 col-lg-6">
        @include('partials._errors')
        <div class="card">
          <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Actualizar Usuario <strong>{{ $user->email }}</strong></h4>
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
              <fieldset class="form-group">
                <label>{{ trans('t.user.profile.lang') }}<small class="text-danger">*</small></label>
                <select class="form-control select2" name="lang" required="" value="{{$user->lang}}">
                  @if ($user->lang == "es")
                    <option selected value="es">{{ trans('t.spanish') }}</option>
                    <option value="en">{{ trans('t.english') }}</option>
                  @else
                    <option value="es">{{ trans('t.spanish') }}</option>
                    <option selected value="en">{{ trans('t.english') }}</option>
                  @endif
                </select>  
              </fieldset>
              @php
                $checkedA ='';
                if($user->admin){$checkedA = 'checked';}
              @endphp
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-form-label col-sm-3 pt-0">{{ trans('t.user.index.admin') }}<small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="admin" class="custom-switch-input" {{ $checkedA }}>
                    <span class="custom-switch-description mr-2">{{ trans('t.no') }}</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">{{ trans('t.yes') }}</span>
                  </label>
                </div>
              </fieldset> 
              @php
                $checkedS =''; 
                if($user->specialist){$checkedS = 'checked';}
              @endphp
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-form-label col-sm-3 pt-0">{{ trans('t.user.index.specialist') }}<small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="specialist" class="custom-switch-input" {{ $checkedS }}>
                    <span class="custom-switch-description mr-2">{{ trans('t.no') }}</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">{{ trans('t.yes') }}</span>
                  </label>
                </div>
              </fieldset>

              <div class="form-group row">
                <label for="inputSpecialty" class="col-sm-3 col-form-label">{{ trans('t.user.profile.specialty') }} <span class="text-danger"></span></label>
                <div class="col-sm-9">
                  <input type="text" name="specialty" class="form-control" id="inputSpecialty" placeholder="{{ trans('t.user.profile.specialty') }}" value="{{ $user->specialty }}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Imagen Actual <small>(Opcional)</small></label>
                <div class="input-group">
                  <img src="{{ $user->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                </div>
            </div> 
              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">{{trans('t.user.profile.photo')}}</label>
                <div class="col-sm-9">
                  <!-- <img src=""  class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""> -->
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>  
              <div class="form-group center-text dropzone">
                  <div id="preview"></div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{ trans('button.update') }}</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="card">
          <form action="{{route('user.email', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Cambiar contraseña</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">{{ trans('t.user.profile.password') }} * (123456)</label>
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="{{ trans('t.user.profile.password') }}" required="" value="123456">
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">{{ trans('button.update') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="/vendor/intwo/validate-run.js"></script>
<script src="/vendor/intwo/preview.js"></script>
@endpush
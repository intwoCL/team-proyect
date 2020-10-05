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
    <h1>{{trans('t.user.create.title')}}</h1>
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
          <form id="form-dropzone" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="card-header">
                <h4>Formulario nuevo usuario</h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">{{ trans('t.user.profile.email') }}<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="{{ trans('t.user.profile.email') }}" required="" name="email">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">{{ trans('t.user.profile.password') }} <span class="text-danger">* (123456)</span></label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="{{ trans('t.user.profile.password') }}" required="" value="123456">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputFirstName" class="col-sm-3 col-form-label">Nombre Tutor<span class="text-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputFirstName" placeholder="{{ trans('t.user.profile.first_name') }}" required="" name="first_name">
                  </div>

                  {{-- <label for="inputLastName" class="col-sm-3 col-form-label">{{ trans('t.user.profile.last_name') }}<span class="text-danger">*</span></label> --}}
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputLastName" placeholder="{{ trans('t.user.profile.last_name') }}" required="" name="last_name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputRut" class="col-sm-3 col-form-label">Nombre del niño</label>
                  <div class="col-sm-9">
                    <input type="text" name="child_name" class="form-control" autocomplete="off" value="{{ old('child_name') }}" placeholder="">
                  </div>
                </div>
                <fieldset class="form-group">
                  <label>Genero<small class="text-danger">*</small></label>
                  <select class="form-control select2" name="gender" required>
                    <option value="0">No mencionar</option>
                    <option value="1">Hombre</option>
                    <option value="2">Mujer</option>
                  </select>  
                </fieldset>
            
                <fieldset class="form-group">
                  <label>{{ trans('t.user.profile.lang') }}<small class="text-danger">*</small></label>
                  <select class="form-control select2" name="lang" required="">
                    <option value="es">{{ trans('t.spanish') }}</option>
                    <option value="en">{{ trans('t.english') }}</option>
                  </select>  
                </fieldset>
                <fieldset class="form-group">
                  <div class="row">
                    <div class="col-form-label col-sm-6 pt-0">¿Es administrador? <small class="text-danger">*</small></div>
                    <label class="custom-switch mt-2">
                      <input type="checkbox" name="admin" class="custom-switch-input">
                      <span class="custom-switch-description mr-2">{{ trans('t.no') }}</span>
                      <span class="custom-switch-indicator"></span>
                      <span class="custom-switch-description">{{ trans('t.yes') }}</span>
                    </label>
                  </div>
                </fieldset>

                <fieldset class="form-group">
                  <div class="row">
                    <div class="col-form-label col-sm-6 pt-0">¿Es especialista? <small class="text-danger">*</small></div>
                    <label class="custom-switch mt-2">
                      <input type="checkbox" name="specialist" id="specialist" class="custom-switch-input">
                      <span class="custom-switch-description mr-2">{{ trans('t.no') }}</span>
                      <span class="custom-switch-indicator"></span>
                      <span class="custom-switch-description">{{ trans('t.yes') }}</span>
                    </label>
                  </div>
                </fieldset>

                <div class="form-group row" hidden id="id_specialty">
                  <label for="inputSpecialty" class="col-sm-3 col-form-label">{{ trans('t.user.profile.specialty') }}</label>
                  <div class="col-sm-9">
                    <input type="text" name="specialty" class="form-control" id="inputSpecialty" placeholder="{{ trans('t.user.profile.specialty') }}" value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPhoto" class="col-sm-3 col-form-label">{{trans('t.user.profile.photo')}}</label>
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
                <button class="btn btn-primary">{{ trans('button.save') }}</button>
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

<script>
$('#specialist').change(function() {
  if (!this.checked) {
    $("#id_specialty").attr('hidden',true);
  }else{
    $("#id_specialty").removeAttr("hidden");
  }
});
</script>
@endpush